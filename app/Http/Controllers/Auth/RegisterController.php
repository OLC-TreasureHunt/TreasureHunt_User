<?php

namespace App\Http\Controllers\Auth;

use DB;
use Log;
use Session;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Master;
use App\Models\Referral;
use App\Models\User;
use App\MailManager;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm(Request $request)
    {
        $affiliate = $request->only('aid');
        
        $validator = Validator::make($affiliate, [
            'affiliate_id' => ['exists:th_users,affiliate_id']
        ]);
        if ($validator->fails()) {
            $affiliate = '';
        } else {
            $affiliate = $affiliate['aid']?? '';
        }

        $countries = Country::all()->toArray();
        $data['country_list'] = $countries;
        $data['affiliate'] = $affiliate;
        $data['register_url'] = env('APP_URL') . '/register?aid=';

        return view('auth.register', $data);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:128'],
            'email' => ['required', 'string', 'email', 'max:128',
                Rule::unique('th_users')->where(function ($query) use($data) {
                    return $query->where('email', $data['email']);
                })],
            'password' => ['required', 'string', 'min:8', 'max:255', 'confirmed', 'regex:/(?=.*[a-zA-Z])(?=.*[0-9])/'],
            'birthday' => ['nullable', 'date'],
            'mobile' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:64'],
            'lang' => ['required', 'string', 'max:4'],  
            'address' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:64'],
            'postal_code' => ['required', 'string', 'max:16'],
        ], [
            'name' => trans('register.name'),
            'email' => trans('register.email'),
            'password' => trans('register.password'),
            'birthday' => trans('register.birthday'),
            'mobile' => trans('register.mobile'),
            'country' => trans('register.country'),
            'lang' => trans('register.lang'),
            'address' => trans('register.address'),
            'city' => trans('register.city'),
            'postal_code' => trans('register.postal_code'),
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $avatar_url = cAsset('images/avatars/default.png');

        $user = User::create([
            'affiliate_id'      => Master::generateUserID(),
            'name'              => $data['name'],
            'email'             => $data['email'],
            'password'          => Hash::make($data['password']),
            'password_plain'    => $data['password'],
            'birthday'          => date('Y-m-d', strtotime($data['birthday'])),
            'gender'            => $data['gender'],
            'mobile'            => $data['mobile'],
            'country'           => $data['country'],
            'lang'              => $data['lang'],
            'address'           => $data['address'],
            'postal_code'       => $data['postal_code'],
            'city'              => $data['city'],
            'status'            => config('constants.user_status.invalid')
        ]);

        $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
        $user->status = STATUS_BANNED;
        $user->avatar = $avatar_url;
        $user->token = $token;
        $user->save();

        if ($data['affiliate']) {
            $parent = User::where('affiliate_id', $data['affiliate'])->first();
            $parent_id = $parent? $parent->id : 1;
        } else {
            $parent_id = 1;
        }
        
        Referral::create([
            'user_id'           => $user->id,
            'parent_id'         => $parent_id,
            'prev_parent_id'    => $parent_id,
            'status'            => 1
        ]);

        return $user;
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        event(new Registered($user = $this->create($request->all())));

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }

    protected function registered(Request $request, $user)
    {
        $ret = MailManager::send_verifymail($user);
        session()->put('resend_user',
            ['name' => $user['name'], 'token' => $user['token'], 'email' => $user['email']]);

        $user_id = $user['id'];
        Auth::logout();

        if ($ret == false) {
            try {
                User::where('id', $user_id)->delete();
            } catch(\Exception $ex) {
                Log::debug("Register Error:" . $ex->getMessage());
            }
        }

        return view('auth.send_activation', ['ret' => $ret]);
    }

    public function get_activation($token = "") {
		$ret = 0;
        $treasure_id = '';
        $bicorn_id = '';

		if (!empty($token)) {
			$user = User::where('token', $token)->first();
            $treasure_id = $user->affiliate_id;
			if (!empty($user)) {
				$createdAt = $user->created_at;
				$chkDate = date('Y-m-d H:i:s', strtotime($createdAt . VALID_TOKEN_PERIOD));
				$today = date('Y-m-d H:i:s');

				if ($today > $chkDate) { //Token valid period is passed.
					$ret = 3;
				} else {
					try {
                        $parent_id = $user->parent->parent_id?? 1;
                        $affiliate_code = User::find($parent_id)->email;
                        $body = array_filter($user->toArray(), function($index) {
                            return in_array($index, ['affiliate_id', 'email', 'name', 'birthday', 'gender', 'country', 'mobile', 'city', 'postal_code', 'address', 'password_plain', 'avatar']);
                        }, ARRAY_FILTER_USE_KEY);
                        $body['referral'] = $affiliate_code;
                        
                        $encBody = my_encrypt(json_encode($body), env('BICORN_API_KEY'));
                        $response = g_sendHttpRequest(config('app.BICORN_URL') . '/api/user/store', HTTP_METHOD_POST, ['body' => $encBody]);
                        $response = json_decode($response, true);
						
                        if ($response['result'] == 1) {
                            $bicorn_id = $response['userid'];

                            $user->status = STATUS_ACTIVE;
                            $user->token = '';
                            $user->password_plain = '';
                            $user->bicorn_id = $bicorn_id;
                            $user->save();
                            
                            $ret = 0;
                        } else if ($response['result'] == 2) {
                            $bicorn_id = $response['userid'];

                            $user->status = STATUS_ACTIVE;
                            $user->token = '';
                            $user->password_plain = '';
                            $user->bicorn_id = $bicorn_id;
                            $user->save();
                            
                            $ret = 5;
                        }
                        else {
                            $user->status = STATUS_FAIL;
                            $user->save();
                            $ret = 4;
                        }
                        
					} catch(\Exception $ex) {
						Log::debug($ex->getMessage());
						$ret = 4;
					}
				}
			} else {
				$ret = 2; //Invalid Token
			}
		} else {
			$ret = 1; //No Token
		}

		return view('auth.activation', ['ret' => $ret, 'treasure_id' => $treasure_id, 'bicorn_id' => $bicorn_id]);
	}
}

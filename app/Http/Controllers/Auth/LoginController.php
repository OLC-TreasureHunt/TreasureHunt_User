<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\LoginSetting;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    public function showLoginForm()
    {
        $setting = LoginSetting::latest()->first();
        return view('auth.login', ["setting"=> $setting]);
    }

    public function findUsername()
    {
        $login = request()->input('login');

        $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'affiliate_id';

        request()->merge([$fieldType => $login]);

        return $fieldType;
    }

    public function username()
    {
        return $this->username;
    }

    protected function credentials(Request $request)
	{
		$params = $request->only($this->username(), 'password');
		$params['status'] = STATUS_ACTIVE;
		return $params;
	}
}

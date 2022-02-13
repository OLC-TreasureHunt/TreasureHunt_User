<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
use Password;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    public function __construct()
    {
        $this->middleware('guest');
    }
    
    public function reset(Request $request)
    {
        $request->validate($this->rules(), $this->validationErrorMessages());
        $token = $request->get('token');

        $retVal = 0;
        $emailInfo = User::where('email', $request->input('email'))->where('status', STATUS_ACTIVE)->first();
        $tokenInfo = User::where('remember_token', $request->input('token'))->where('status', STATUS_ACTIVE)->first();

        if($emailInfo == null) {
            $retVal = -99;
        }

        if($tokenInfo == null) {
            $retVal = -98;
        }

        $user = User::where('email', $request->input('email'))->where('remember_token', $request->input('token'))->first();

        if($user == null)
            $retVal = -90;

        if ($retVal < 0) {
            Session::put('retVal', $retVal);
            return redirect()
                ->back()
                ->withInput($request->except('password'));
        }

        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            Auth::logout();
            return view('auth.passwords.reset_confirm');
        } else {
            
            Auth::logout();
            Session::put('retVal', -98);
            return redirect()
                ->back()
                ->withInput($request->except('password'));
        }

        return $this->sendResetFailedResponse($request, $response);
    }
}

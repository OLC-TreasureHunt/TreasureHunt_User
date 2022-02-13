<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;

use Log;
use App\MailManager;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
	public function __construct()
	{
		$this->middleware('guest');
	}

	public function sendResetLinkEmail(Request $request)
	{
		$this->validateEmail($request);

		// We will send the password reset link to this user. Once we have attempted
		// to send the link, we will examine the response then see the message we
		// need to show to the user. Finally, we'll send out a proper response.
		$response = null;
		try {
			$user = User::where('email', $request->input('email'))->where('status', STATUS_ACTIVE)->first();
			if ($user == null) {
				$response = 'register.activation.not_register';
			} else {
				$token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);

				$user->remember_token = $token;
				$user->save();

				$ret = MailManager::send_forgotmail($user);
				if ($ret == false) {
					$response = 'message.mail.send_fail';
				} else {
					$response = Password::RESET_LINK_SENT;
				}
			}
		} catch(\Exception $e) {
			Log::error($e->getMessage());

			return back()
				->withInput($request->only('email'))
				->withErrors(['email' => trans('message.mail.send_fail')]);
		}

		return $response == Password::RESET_LINK_SENT
			? $this->sendResetLinkResponse($request, $response)
			: $this->sendResetLinkFailedResponse($request, $response);
	}
}

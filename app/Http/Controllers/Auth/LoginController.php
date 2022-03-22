<?php

namespace App\Http\Controllers\Auth;

use Session;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Services\AllianceService;
use App\Models\MaintenanceToken;
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

    protected $allianceService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AllianceService $allianceService)
    {
        $this->allianceService = $allianceService;
        $this->middleware('guest')->except('logout');

        $this->username = $this->findUsername();
    }

    public function showLoginForm(Request $request)
    {
        $access_token = $request->get('access_token');
        if (!MaintenanceToken::isValid($access_token)) $access_token = '';
        Session::put('access_token', $access_token);

        $setting = LoginSetting::latest()->first();
        $alliances = $this->allianceService->alliances();

        return view('auth.login', [
            "setting"           => $setting,
            'access_token'      => $access_token,
            'alliances'         => $alliances
        ]);
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

<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Session;
use App\Models\Master;
use App\Models\MaintenanceContent;
use App\Models\MaintenanceToken;
use Illuminate\Http\Request;

class CheckMaintenance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $url = $request->fullUrl();

        $mode = Master::getValue("MAINTENANCE_MODE");
        if ($mode == 0) {
            Session::forget('access_token');
        }

        $token = $request->get('access_token');
        if ($token == '') {
            $token = Session::get('access_token', '');
        }
        if (MaintenanceToken::isValid($token)) {
            return $next($request);
        }
        Session::forget('access_token');

        $error = $request->get('error');
        if ($error == 1) {
            return $next($request);
        }

        if ($mode == 1) {
            Session::put('is_maintenance', true);
            Auth::logout();
            return redirect()->route('maintenance', ['error' => 1]);
        }
        Session::forget('is_maintenance');

        return $next($request);
    }
}

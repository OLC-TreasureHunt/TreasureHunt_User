<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use App\Models\CryptoSettings;
use App\Models\UserBalance;
use Illuminate\Http\Request;
use Auth;

class GetCryptoSettings
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $crypto_settings = CryptoSettings::getAll();
        $balance_list = UserBalance::getBalanceList();
        
        Session::put('crypto_settings',     $crypto_settings);
        Session::put('balance_list',        $balance_list);

        return $next($request);
    }
}

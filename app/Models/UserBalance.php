<?php

namespace App\Models;

use App\Models\CryptoSettings;
use Illuminate\Database\Eloquent\Model;
use Auth;

class UserBalance extends Model
{
    protected $table = 'th_users_balance';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'currency',
        'balance',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function initUserBalance($user_id) {
        $cryptos = CryptoSettings::All();

        $insert_data = [];
        foreach($cryptos as $item) {
            array_push($insert_data, [
                'user_id'    => $user_id, 
                'currency'   => $item['currency'], 
                'balance'     => 0
            ]);
        }

        $ret = self::where('user_id', $user_id)->delete();
        $ret = self::insert($insert_data);
        return $ret;
    }

    public static function getBalanceList() {
        $cryptos = CryptoSettings::All();

        $is_login = Auth::check();
        $user_info = Auth::user();

        $ret_val = [];
        foreach($cryptos as $item) {
            if($is_login) {
                $user_id = $user_info->id;
                $balance = self::where('user_id', $user_id)->where('currency', $item['currency'])->first();

                if(!isset($balance))
                    $balance = 0;
                else
                    $balance = $balance->balance;

                $ret_val[$item['currency']] = array(
                    'balance'       => $balance,
                );
            }
        }

        return $ret_val;
    }

    public static function getBalance($_user_id, $_currency) {
        $currency = in_array($_currency, USDT_COINS) ? 'USDT' : $_currency;

        $info = self::where('user_id', $_user_id)
            ->where('currency', $currency)
            ->first();

        if(!isset($info)) return null;

        return $info;
    }

    public static function getApiForBalanceList($_user_id, $_type) {
        $balances = self::where('user_id', $_user_id)
            ->get();

        $ret_val = [];
        foreach($balances as $balance) {
            $ret_val[$balance->currency] = array(
                'balance'       => $balance->$_type
            );
        }

        return $ret_val;
    }
}

<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'th_users';

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'affiliate_id',
        'name',
        'email',
        'password',
        'bicorn_id',
        'password_plain',
        'birthday',
        'gender',
        'country',
        'mobile',
        'postal_code',
        'address',
        'kyc_status',
        'lang',
        'city',
        'is_premium',
        'is_binary_added',
        'status',
        'avatar',
        'token',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function checkUserId($userid) {
        $ret = self::where('affiliate_id', $userid)
            ->select('id')
            ->get();

        if (!isset($ret) || count($ret) == 0) {
            return true;
        }

        return false;
    }

    public function parent() {
        return $this->hasOne(Referral::class);
    }

    public static function updateLocale($user_id, $lang) {
        $ret = self::where('id', $user_id)
            ->update([
                'lang'      => $lang
            ]);

        return $ret;
    }

    public function binary() {
        return $this->hasOne(Binary::class);
    }


}

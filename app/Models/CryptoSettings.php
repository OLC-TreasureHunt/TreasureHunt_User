<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class CryptoSettings extends BaseModel
{
    protected $table = 'th_crypto_settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'currency',
        'currency_url',
        'type',
        'unit',
        'rate_decimals',
        'status',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public static function getAll() {
        $selector = self::where('status', STATUS_ACTIVE);

        $records = $selector->select('*')->get();

        $result = array();
        foreach ($records as $index => $record) {
            $result[$record->currency] = array(
                'currency'      => $record->currency,
                'name'          => $record->name,
                'type'          => $record->type,
                'unit'          => $record->unit,
                'rate_decimals' => $record->rate_decimals,
                'status'        => $record->status,
            );
        }

        return $result;
    }
}
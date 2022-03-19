<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceToken extends Model
{
    use HasFactory;
    protected $table = 'th_maintenance_tokens';

    public static function isValid($token) {
	    $record = self::where('token', $token)
            ->select('id')
            ->first();

	    if (!isset($record) || !isset($record->id) || $record->id == 0) {
	        return false;
        }

	    return true;
    }
}

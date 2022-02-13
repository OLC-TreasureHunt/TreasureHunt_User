<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'th_countries';
    use HasFactory;

    protected $fillable = [
        'alpha2Code',
        'name',
        'nativeName',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends BaseModel
{
    use HasFactory;
    protected $table = 'th_contact';

    protected $fillable = [
        'user_id',
        'title',
        'content',
        'email',
        'reply',
        'status'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

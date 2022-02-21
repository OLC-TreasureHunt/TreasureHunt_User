<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Binary extends BaseModel
{
    use HasFactory;
    protected $table = 'th_binary';

    public function userOfBinaryNode() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends BaseModel
{
    use HasFactory;
    protected $table = 'th_datas';

    public function files() {
        return $this->hasMany(FileLink::class, 'data_id');
    }
}

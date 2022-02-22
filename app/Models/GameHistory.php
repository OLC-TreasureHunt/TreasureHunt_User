<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameHistory extends BaseModel
{
    use HasFactory;
    protected $table = 'th_manual_input_data';
    protected $sortable = ['created_at, loss_jpy'];
}

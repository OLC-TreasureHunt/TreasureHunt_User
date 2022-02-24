<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoticeDetail extends BaseModel
{
    use HasFactory;
    protected $table = 'th_users_notifications_detail';

    public function notice() {
        return $this->belongsTo(Notice::class, 'notify_id', 'id');
    }
}

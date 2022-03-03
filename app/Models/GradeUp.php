<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GradeUp extends BaseModel
{
    use HasFactory;
    protected $table = 'th_users_grade_up';

    public function levelInfo() {
        return $this->belongsTo(BonusRateSetting::class, 'curr_level');
    }
}

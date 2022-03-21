<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceContent extends Model
{
    use HasFactory;
    protected $table = 'th_maintenance_contents';

    public function scopeLocale($builder, $locale) {
        return $builder->where("lang", $locale);
    }
}

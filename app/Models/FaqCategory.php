<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqCategory extends BaseModel
{
    use HasFactory;
    protected $table = 'th_faq_categories';

    public function questions() {
        return $this->hasMany(Faq::class, 'category');
    }

    public function scopeLocale($builder, $local) {
        return $builder->where('lang', $local);
    }
}

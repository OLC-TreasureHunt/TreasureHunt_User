<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends BaseModel
{
    use HasFactory;
    protected $table = 'th_news';

    /**
     * Return news in language
     *
     * @param object $query
     * @return Builder
     */
    public function scopeLanguage($builder, $state = 1)
    {
        return $builder->where("lang", $state);
    }
}

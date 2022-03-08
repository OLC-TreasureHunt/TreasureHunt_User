<?php

namespace App\Repositories\Eloquent;

use App\Models\FaqCategory;
use App\Repositories\FaqRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class FaqRepository
 * @package App\Repositories
 */
class FaqRepository implements FaqRepositoryInterface {

    /**
     * @var NoticeDetail
     */
    protected $faqcategory;
    /**
     * @param FaqCategory $news
     */
    public function __construct(FaqCategory $faqcategory)
    {
        $this->faqcategory = $faqcategory;
    }

    public function all(): Collection
    {
        return $this->faqcategory->all();    
    }

    public function with($value) {
        return $this->faqcategory->with($value);
    }

    public function orderBy($column, $direction) {
        return $this->faqcategory->orderBy($column, $direction);
    }

}
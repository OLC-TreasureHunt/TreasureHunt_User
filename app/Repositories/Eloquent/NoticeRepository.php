<?php

namespace App\Repositories\Eloquent;

use App\Models\NoticeDetail;
use App\Repositories\NoticeRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class NoticeRepository
 * @package App\Repositories
 */
class NoticeRepository implements NoticeRepositoryInterface {

    /**
     * @var NoticeDetail
     */
    protected $noticeDetail;
    /**
     * @param NoticeDetail $news
     */
    public function __construct(NoticeDetail $noticeDetail)
    {
        $this->noticeDetail = $noticeDetail;
    }

    /**
     * Notice Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate($filter)
    {
        return $this->noticeDetail->paginate($filter);
    }

    /**
     * Get Notice by ID
     *
     * @param $post_id
     * @return Notice
     */
    public function find($post_id)
    {
        return $this->noticeDetail->findOrFail($post_id);
    }

    /**
     * Get Notice with filter
     * @param array $filter
     * @return Notice
     */
    public function filter($filter) {
        return $this->noticeDetail->filter($filter);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->noticeDetail->all();    
    }

    public function with($value) {
        return $this->noticeDetail->with($value);
    }

    public function orderBy($column, $direction) {
        return $this->noticeDetail->orderBy($column, $direction);
    }

}
<?php

namespace App\Repositories\Eloquent;

use App\Models\News;
use App\Repositories\NewsRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class NewsRepository
 * @package App\Repositories
 */
class NewsRepository implements NewsRepositoryInterface {

    /**
     * @var News
     */
    protected $news;
    /**
     * @param News $news
     */
    public function __construct(News $news)
    {
        $this->news = $news;
    }

    /**
     * News Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate($filter)
    {
        return $this->news->paginate($filter);
    }

    /**
     * Get News by ID
     *
     * @param $post_id
     * @return News
     */
    public function find($post_id)
    {
        return $this->news->findOrFail($post_id);
    }

    /**
     * Get News with filter
     * @param array $filter
     * @return News
     */
    public function filter($filter) {
        return $this->news->filter($filter);
    }

    public function language($lang) {
        return $this->news->language($lang);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->news->all();    
    }

}
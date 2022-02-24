<?php
namespace App\Services;

use App\Repositories\NewsRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class NewsService
 * @package App\Services
 */
class NewsService extends Service {

    /**
     * @var NewsRepositoryInterface
     */
    protected $news;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param NewsRepositoryInterface $news
     * @param Log $logger
     */
    public function __construct(NewsRepositoryInterface $news, Log $logger)
    {
        $this->news = $news;
        $this->logger = $logger;
    }

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter)
    {
        $locale = app()->getlocale();
        return $this->news->language($locale)
            ->active()
            ->orderBy('created_at', 'desc')->paginate(6);
    }

    /**
     * Get News by ID
     *
     * @param $news_id
     * @return News
     */
    public function find($news_id)
    {
        try {
            return $this->news->find($news_id);
        } catch (\Exception $e) {
            $this->logger->error('Post->find: ' . $e->getMessage());
            return null;
        }
    }


    public function topNews() {
        $locale = app()->getlocale();
        return $this->news->language($locale)
            ->active()
            ->orderBy('created_at', 'desc')
            ->first();
    }

    public function popular() {
        $locale = app()->getlocale();
        return $this->news->language($locale)
            ->active()
            ->orderBy('read_count', 'desc')
            ->take(5)
            ->get();
    }

    public function increaseCount($news_id) {
        $news = $this->news->find($news_id);
        $news->read_count = $news->read_count + 1;
        $news->save();
    }
}
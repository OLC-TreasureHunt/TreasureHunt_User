<?php
namespace App\Services;

use Auth;
use App\Repositories\NoticeRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class NoticeService
 * @package App\Services
 */
class NoticeService extends Service {

    /**
     * @var NoticeRepositoryInterface
     */
    protected $notice;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param NoticeRepositoryInterface $notice
     * @param Log $logger
     */
    public function __construct(NoticeRepositoryInterface $notice, Log $logger)
    {
        $this->notice = $notice;
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
        return $this->notice->orderBy('created_at', 'desc')->paginate(6);
    }

    /**
     * Get News by ID
     *
     * @param $notice_id
     * @return News
     */
    public function find($notice_id)
    {
        try {
            return $this->notice->find($notice_id);
        } catch (\Exception $e) {
            $this->logger->error('Post->find: ' . $e->getMessage());
            return null;
        }
    }

    public function getNotice($array) {
        return $this->notice->with('notice')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function setReadMark($notice_detail_id) {
        $notice = $this->notice->find($notice_detail_id);
        $notice->status = 1;
        $notice->save();
    }
}
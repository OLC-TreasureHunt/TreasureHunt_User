<?php
namespace App\Services;

use App\Repositories\FaqRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class FaqService
 * @package App\Services
 */
class FaqService extends Service {

    /**
     * @var FaqRepositoryInterface
     */
    protected $faqcategory;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param FaqRepositoryInterface $news
     * @param Log $logger
     */
    public function __construct(FaqRepositoryInterface $faqcategory, Log $logger)
    {
        $this->faqcategory = $faqcategory;
        $this->logger = $logger;
    }

    public function faqs() {
        $locale = app()->getlocale();
        return $this->faqcategory->with(['questions' => function($query) {
            return $query->where('status', 1);
        }])->locale($locale)->get();
    }
}
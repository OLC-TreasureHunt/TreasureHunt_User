<?php
namespace App\Services;

use App\Repositories\MaintenanceRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class MaintenanceService
 * @package App\Services
 */
class MaintenanceService extends Service {

    /**
     * @var MaintenanceRepositoryInterface
     */
    protected $maintenance;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param MaintenanceRepositoryInterface $maintenance
     * @param Log $logger
     */
    public function __construct(MaintenanceRepositoryInterface $maintenance, Log $logger)
    {
        $this->maintenance = $maintenance;
        $this->logger = $logger;
    }

    public function content() {
        $locale = app()->getLocale();
        return $this->maintenance->locale($locale)->first();
    }
}
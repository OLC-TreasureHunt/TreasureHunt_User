<?php
namespace App\Services;

use App\Repositories\AllianceRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class AllianceService
 * @package App\Services
 */
class AllianceService extends Service {

    /**
     * @var AllianceRepositoryInterface
     */
    protected $alliance;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param AllianceRepositoryInterface $alliance
     * @param Log $logger
     */
    public function __construct(AllianceRepositoryInterface $alliance, Log $logger)
    {
        $this->alliance = $alliance;
        $this->logger = $logger;
    }

    public function alliances() {
        return $this->alliance->active()->get();
    }
}
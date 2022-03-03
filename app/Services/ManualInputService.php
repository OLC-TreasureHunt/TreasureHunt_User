<?php
namespace App\Services;

use App\Repositories\ManualInputRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class ManualInputService
 * @package App\Services
 */
class ManualInputService extends Service {

    /**
     * @var ManualInputRepositoryInterface
     */
    protected $manualInput;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param ManualInputRepositoryInterface $manualInput
     * @param Log $logger
     */
    public function __construct(ManualInputRepositoryInterface $manualInput, Log $logger)
    {
        $this->manualInput = $manualInput;
        $this->logger = $logger;
    }

    public function find($id)
    {
        try {
            return $this->manualInput->find($id);
        } catch (\Exception $e) {
            $this->logger->error('Post->find: ' . $e->getMessage());
            return null;
        }
    }

    public function last()
    {
        try {
            return $this->manualInput->all()->last();
        } catch (\Exception $e) {
            $this->logger->error('Post->find: ' . $e->getMessage());
            return null;
        }
    }
    
}
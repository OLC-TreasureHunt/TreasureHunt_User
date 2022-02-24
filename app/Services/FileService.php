<?php
namespace App\Services;

use App\Repositories\FileRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class FileService
 * @package App\Services
 */
class FileService extends Service {

    /**
     * @var FileRepositoryInterface
     */
    protected $file;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param FileRepositoryInterface $file
     * @param Log $logger
     */
    public function __construct(FileRepositoryInterface $file, Log $logger)
    {
        $this->file = $file;
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
        return $this->file->with('files')->active()->paginate(5);
    }

}
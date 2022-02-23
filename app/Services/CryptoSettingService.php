<?php
namespace App\Services;

use Auth;
use App\Models\User;
use App\Repositories\CryptoSettingRepositoryInterface;
use App\Services\Service;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as Log;


/**
 * Class CryptoSettingService
 * @package App\Services
 */
class CryptoSettingService extends Service {

    /**
     * @var CryptoSettingRepositoryInterface
     */
    protected $cryptosetting;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param CryptoSettingRepositoryInterface $history
     * @param Log $logger
     */
    public function __construct(CryptoSettingRepositoryInterface $cryptosetting, Log $logger)
    {
        $this->cryptosetting = $cryptosetting;
        $this->logger = $logger;
    }

    public function all() 
    {
        return $this->cryptosetting->all();
    }
    
}
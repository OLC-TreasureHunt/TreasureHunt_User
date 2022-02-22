<?php
namespace App\Services;

use Auth;
use App\Models\User;
use App\Repositories\HistoryRepositoryInterface;
use App\Services\Service;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as Log;


/**
 * Class HistoryService
 * @package App\Services
 */
class HistoryService extends Service {

    /**
     * @var HistoryRepositoryInterface
     */
    protected $history;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param HistoryRepositoryInterface $history
     * @param Log $logger
     */
    public function __construct(HistoryRepositoryInterface $history, Log $logger)
    {
        $this->history = $history;
        $this->logger = $logger;
    }

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter = [])
    {
        return $this->history->paginate($filter);
    }

    public function gameHistory(Request $request) 
    {
        $filter = $request->all();

        
        if ($filter['sort'] && $filter['order']) {
            return $this->history->filter([
                'user_id' => Auth::user()->id
            ])->orderBy($filter['sort'], $filter['order'])
            ->paginate($filter['limit']);
        } else {
            return $this->history->filter([
                'user_id' => Auth::user()->id
            ])->paginate($filter['limit']);
        }
    }
}
<?php
namespace App\Services;

use Auth;
use App\Enums\UserBonusStatus;
use App\Models\User;
use App\Repositories\BonusHistoryRepositoryInterface;
use App\Services\Service;
use Illuminate\Http\Request;
use Psr\Log\LoggerInterface as Log;


/**
 * Class BonusHistoryService
 * @package App\Services
 */
class BonusHistoryService extends Service {

    /**
     * @var BonusHistoryRepositoryInterface
     */
    protected $history;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param BonusHistoryRepositoryInterface $history
     * @param Log $logger
     */
    public function __construct(BonusHistoryRepositoryInterface $history, Log $logger)
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

    public function bonusHistory(Request $request) {
        $filter = $request->all();
        
        if ($filter['sort'] && $filter['order']) {
            $history = $this->history->filter([
                'user_id' => Auth::user()->id
            ])->orderBy($filter['sort'], $filter['order'])
            ->paginate($filter['limit']);
        } else {
            $history = $this->history->filter([
                'user_id' => Auth::user()->id
            ])->paginate($filter['limit']);
        }

        foreach ($history as $item) {
            $item->apply_status = UserBonusStatus::getDescription($item->apply_status);
        }

        return $history;
    }
}
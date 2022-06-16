<?php
namespace App\Services;

use Auth;
use App\Enums\TreeType;
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

        if (!isset($filter['sort'])) {
            $filter['sort'] = 'created_at';
        }
        if (!isset($filter['order'])) {
            $filter['order'] = 'desc';
        }

        $history = $this->history->filter([
                'user_id' => Auth::user()->id
            ])
            ->groupBy('settle_id')
            ->select('settle_id')
            ->paginate($filter['limit']);

        foreach ($history as $item) {
            $dump = $this->history->with('levelInfo')->with('settleInfo')->filter([
                'user_id' => Auth::user()->id,
                'settle_id' => $item->settle_id
            ])->orderBy('type')->get()->keyBy('type');

            $sum = 0;
            $records = array();
            $settle_month = 0;
            $total_bet = 0;
            foreach ($dump as $type => $data) {
                $data->level = $data->levelInfo->name->level;
                if ($type == 1) {
                    $records[] = $data;
                } else if ($type == 2 && count($records) == 1) {
                    $records[] = $data;
                } else if ($type == 2 && count($records) == 0) {
                    $records[] = [
                        'basic_bonus' => '0',
                        'bonus_rate' => '0',
                        'level'   => '',
                        'bonus' => '0'
                    ];
                    $records[] = $data;
                }
                $sum = $sum + $data->bonus;
                $settle_month = $data->settleInfo->settle_month;
                $total_bet = $data->total_bet;
            }
            $item->data = $records;
            $item->sum = $sum;
            $item->settle_month = $settle_month;
            $item->total_bet = $total_bet;
        }

        return $history;
    }
}
<?php

namespace App\Repositories\Eloquent;

use App\Models\BonusHistory;
use App\Repositories\HistoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BonusHistoryRepository
 * @package App\Repositories
 */
class BonusHistoryRepository implements HistoryRepositoryInterface {

    /**
     * @var BonusHistory
     */
    protected $history;
    /**
     * @param BonusHistory $history
     */
    public function __construct(BonusHistory $history)
    {
        $this->history = $history;
    }

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate($filter)
    {
        return $this->history->paginate($filter);
    }

    
    /**
     * Get BonusHistory with filter
     * @param array $filter
     * @return BonusHistory
     */
    public function filter($filter) {
        return $this->history->filter($filter);
    }
}
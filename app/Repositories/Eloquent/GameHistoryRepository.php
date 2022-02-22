<?php

namespace App\Repositories\Eloquent;

use App\Models\GameHistory;
use App\Repositories\HistoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class GameHistoryRepository
 * @package App\Repositories
 */
class GameHistoryRepository implements HistoryRepositoryInterface {

    /**
     * @var GameHistory
     */
    protected $history;
    /**
     * @param GameHistory $history
     */
    public function __construct(GameHistory $history)
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
     * Get GameHistory with filter
     * @param array $filter
     * @return GameHistory
     */
    public function filter($filter) {
        return $this->history->filter($filter);
    }

}
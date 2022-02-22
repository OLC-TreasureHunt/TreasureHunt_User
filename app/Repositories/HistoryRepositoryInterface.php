<?php
namespace App\Repositories;

use App\Models\Binary;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface HistoryRepositoryInterface
 * @package App\Repositories
 */
interface HistoryRepositoryInterface {

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter);

    /**
     * Get Binary with filter
     * @param array $filter
     * @return Binary
     */
    public function filter(array $filter);

}

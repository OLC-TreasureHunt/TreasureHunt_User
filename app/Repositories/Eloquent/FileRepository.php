<?php

namespace App\Repositories\Eloquent;

use App\Models\File;
use App\Repositories\FileRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;

/**
 * Class FileRepository
 * @package App\Repositories
 */
class FileRepository implements FileRepositoryInterface {

    /**
     * @var File
     */
    protected $history;
    /**
     * @param File $history
     */
    public function __construct(File $history)
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

    public function active($value = 1) {
        return $this->history->active();
    }

    public function with($value) {
        return $this->history->with($value);
    }
}
<?php
namespace App\Repositories;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface FileRepositoryInterface
 * @package App\Repositories
 */
interface FileRepositoryInterface {

    /**
     * File Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter);

}

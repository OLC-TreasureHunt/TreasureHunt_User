<?php
namespace App\Repositories;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface NewsRepositoryInterface
 * @package App\Repositories
 */
interface NewsRepositoryInterface {

    /**
     * File Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter);

    /**
     * Get Post by ID
     * @param $post_id
     * @return File
     */
    public function find($post_id);


    /**
     * Get Binary with filter
     * @param array $filter
     * @return File
     */
    public function filter(array $filter);

    public function language($lang);

    public function all();

}

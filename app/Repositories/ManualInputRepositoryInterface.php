<?php
namespace App\Repositories;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ManualInputRepositoryInterface
 * @package App\Repositories
 */
interface ManualInputRepositoryInterface {

    public function find($post_id);

    public function all();

}

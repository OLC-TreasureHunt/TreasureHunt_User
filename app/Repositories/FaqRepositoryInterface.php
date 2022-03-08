<?php
namespace App\Repositories;

use App\Models\FaqCategory;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface FaqRepositoryInterface
 * @package App\Repositories
 */
interface FaqRepositoryInterface {
    public function all();
}

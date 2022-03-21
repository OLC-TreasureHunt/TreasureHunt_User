<?php
namespace App\Repositories;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface AllianceRepositoryInterface
 * @package App\Repositories
 */
interface AllianceRepositoryInterface {

    public function all();

    public function active($value);
}

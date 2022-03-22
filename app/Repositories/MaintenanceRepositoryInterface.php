<?php
namespace App\Repositories;

use App\Models\File;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface MaintenanceRepositoryInterface
 * @package App\Repositories
 */
interface MaintenanceRepositoryInterface {
    public function locale($value);
}

<?php

namespace App\Repositories\Eloquent;

use App\Models\MaintenanceContent;
use App\Repositories\MaintenanceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class MaintenanceRepository
 * @package App\Repositories
 */
class MaintenanceRepository implements MaintenanceRepositoryInterface {

    /**
     * @var MaintenanceContent
     */
    protected $maintenance;
    /**
     * @param MaintenanceContent $maintenance
     */
    public function __construct(MaintenanceContent $maintenance)
    {
        $this->maintenance = $maintenance;
    }

    public function locale($value) {
        return $this->maintenance->locale($value);
    }
}
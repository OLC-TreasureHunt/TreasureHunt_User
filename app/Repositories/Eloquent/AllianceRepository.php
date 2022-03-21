<?php

namespace App\Repositories\Eloquent;

use App\Models\Alliance;
use App\Repositories\AllianceRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class AllianceRepository
 * @package App\Repositories
 */
class AllianceRepository implements AllianceRepositoryInterface {

    /**
     * @var Alliance
     */
    protected $alliance;
    /**
     * @param Alliance $alliance
     */
    public function __construct(Alliance $alliance)
    {
        $this->alliance = $alliance;
    }

    /**
     * Get Alliance by ID
     *
     * @param $alliance_id
     * @return Alliance
     */
    public function find($post_id)
    {
        return $this->alliance->findOrFail($post_id);
    }

    /**
    * @return Collection
    */
    public function all(): Collection
    {
        return $this->alliance->all();    
    }

    public function active($value = 1) {
        return $this->alliance->active();
    }

}
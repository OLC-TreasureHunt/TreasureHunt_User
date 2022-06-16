<?php

namespace App\Repositories\Eloquent;

use App\Models\Referral;
use App\Repositories\ReferralRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ReferralRepository
 * @package App\Repositories
 */
class ReferralRepository implements ReferralRepositoryInterface {

    /**
     * @var Referral
     */
    protected $referral;
    /**
     * @param Referral $referral
     */
    public function __construct(Referral $referral)
    {
        $this->referral = $referral;
    }

    /**
     * Create New Referral
     *
     * @param array $postData
     * @return Referral|null
     */
    public function create(array $postData)
    {
        return $this->referral->create($postData);
    }

    /**
     * Referral Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter)
    {
        return $this->referral->paginate($filter['limit']);
    }

    /**
     * Get Referral by ID
     *
     * @param $post_id
     * @return Referral
     */
    public function find($post_id)
    {
        return $this->referral->findOrFail($post_id);
    }

    /**
     * Get Referral with filter
     * @param array $filter
     * @return Referral
     */
    public function filter($filter) {
        return $this->referral->filter($filter)->orderBy('parent_id', 'asc')->get();
    }

    public function orderBy($column, $direction) {
        return $this->referral->orderBy($column, $direction);
    }

}
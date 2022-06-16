<?php
namespace App\Repositories;

use App\Models\Referral;
use Illuminate\Database\Eloquent\Collection;

/**
 * Interface ReferralRepositoryInterface
 * @package App\Repositories
 */
interface ReferralRepositoryInterface {

    /**
     * Create New Referral
     *
     * @param array $referralData
     * @return Referral
     */
    public function create(array $referralData);

    /**
     * Referral Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter);

    /**
     * Get Referral by ID
     * @param $referral_id
     * @return Referral
     */
    public function find($referral_id);
    
    /**
     * Get Referral with filter
     * @param array $filter
     * @return Referral
     */
    public function filter(array $filter);

    public function orderBy($column, $direction);
}

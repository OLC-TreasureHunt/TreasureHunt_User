<?php

namespace App\Repository\Eloquent;

use App\Models\Binary;
use App\Repository\BinaryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BinaryRepository
 * @package App\Repository
 */
class BinaryRepository implements BinaryRepositoryInterface {

    /**
     * @var Binary
     */
    protected $binary;
    /**
     * @param Binary $binary
     */
    public function __construct(Binary $binary)
    {
        $this->binary = $binary;
    }

    /**
     * Create New Binary
     *
     * @param array $postData
     * @return Binary|null
     */
    public function create(array $postData)
    {
        return $this->binary->create($postData);
    }

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter)
    {
        return $this->binary->paginate($filter['limit']);
    }

    /**
     * Get Binary by ID
     *
     * @param $post_id
     * @return Binary
     */
    public function find($post_id)
    {
        return $this->binary->findOrFail($post_id);
    }
}
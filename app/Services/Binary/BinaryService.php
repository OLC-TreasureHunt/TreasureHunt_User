<?php
namespace App\Services\Binary;

use App\Repository\BinaryRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class BinaryService
 * @package App\Services\Binary
 */
class BinaryService extends Service {

    /**
     * @var BinaryRepositoryInterface
     */
    protected $binary;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param BinaryRepositoryInterface $binary
     * @param Log $logger
     */
    public function __construct(BinaryRepositoryInterface $binary, Log $logger)
    {
        $this->binary = $binary;
        $this->logger = $logger;
    }

    /**
     * Show a tree
     * 
     * @param $user_id
     * @return array
     */
    public function tree($user_id) {
        return array();
    }

    /**
     * Create New Binary
     *
     * @param array $postData
     * @return Binary|null
     */
    public function create(array $postData)
    {
        try {
            return $this->binary->create($postData);
        } catch (\Exception $e) {
            $this->logger->error('Binary->create: ' . $e->getMessage());

            return null;
        }
    }

    /**
     * Binary Pagination
     *
     * @param array $filter
     * @return collection
     */
    public function paginate(array $filter = [])
    {
        $filter['limit'] = 5;

        return $this->binary->paginate($filter);
    }

    /**
     * Update Binary
     *
     * @param array $post_id
     * @param array $postData
     * @return bool
     */
    public function update($post_id, array $postData)
    {
        try {
            $binary = $this->binary->find($post_id);
            $binary->title = $postData['title'];
            $binary->description = $postData['description'];

            return $binary->save();
        } catch (\Exception $e) {
            $this->logger->error('Binary->update: ' . $e->getMessage());

            return false;
        }
    }

    /**
     * Delete Binary
     *
     * @param $post_id
     * @return mixed
     */
    public function delete($post_id)
    {
        try {
            $binary = $this->binary->find($post_id);

            return $binary->delete();
        } catch (\Exception $e) {
            $this->logger->error('Binary->delete: ' . $e->getMessage());

            return false;
        }
    }

    /**
     * Get Binary by ID
     *
     * @param $post_id
     * @return Binary
     */
    public function find($post_id)
    {
        try {
            return $this->binary->find($post_id);
        } catch (\Exception $e) {
            $this->logger->error('Binary->find: ' . $e->getMessage());

            return null;
        }
    }



}
<?php
namespace App\Services;

use App\Models\User;
use App\Enums\BinaryStatus;
use App\Enums\UserBonusStatus;
use App\Repositories\BinaryRepositoryInterface;
use App\Services\Service;
use Psr\Log\LoggerInterface as Log;


/**
 * Class BinaryService
 * @package App\Services
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
    public function tree( $user_id ) {
        $tree = $this->binaryTree( $user_id, 0, 0 );
        $tree->class = ['rootNode'];
        $tree->extend = true;

        return $tree;
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

    /**
     * Generate a binary tree json representation.
     * 
     * @param $parnet_id
     */
    protected function binaryTree($parent_id, $limit = 0, $deep) {
        $children = $this->binary->filter([
            'parent_id' => $parent_id,
            'status'    => BinaryStatus::Valid
        ]);
        $parent = User::findOrFail($parent_id);

        $result = new \stdClass();
        $result->name = $parent->affiliate_id;
        $result->image_url = $parent->avatar;
        $result->is_premium = $parent->is_premium?? 0;
        $result->extend = false;

        $self = $this->binary->filter([
            'user_id' => $parent_id
        ]);
        $result->own_loss = $self[0]->own_loss?? 0;
        $result->left_loss = $self[0]->left_loss?? 0;
        $result->right_loss = $self[0]->right_loss?? 0;
        $result->left_count = $self[0]->left_count?? 0;
        $result->right_count = $self[0]->right_count?? 0;
        

        if (count($children) > 0) {
            $result->children = [];
        }

        if ($limit != 0 && $limit == $deep) {
            return $result;
        }

        $newDeep = $deep + 1;
        foreach ($children as $child) {
            $childTree = $this->binaryTree( $child->user_id, $limit, $newDeep );
            $result->children[] = $childTree;
        }

        return $result;
    }

    public function homeTree($user_id) {
        $children = $this->binary->filter([
            'parent_id' => $user_id,
            'status'    => BinaryStatus::Valid
        ]);
        $parent = User::findOrFail($user_id);

        $result = new \stdClass();
        $result->name = $parent->affiliate_id;
        $result->image_url = $parent->avatar;
        $result->extend = true;
        $result->class = ['rootNode'];
        $result->selected = 0;

        $self = $this->binary->filter([
            'user_id' => $user_id
        ]);
        $result->direction = $self[0]->left_loss <= $self[0]->right_loss? 1 : 2; 
        $result->text = trans('home.bets', [
            'amount' => _number_format($self[0]->own_loss?? 0, 0)
        ]);
        
        if (count($children) > 0) {
            $result->children = [];
        }

        foreach ($children as $child) {
            $userInfo = User::findOrFail($child->user_id);
            $node = new \stdClass();
            $node->name = $userInfo->affiliate_id;
            $node->image_url = $userInfo->avatar;
            $node->extend = false;

            if ($child->position == 1) {
                $node->text = trans('home.loss', [
                    'amount' => _number_format($self[0]->left_loss?? 0, 0)
                ]);;
            } else if ($child->position == 2) {
                $node->text = trans('home.loss', [
                    'amount' => _number_format($self[0]->right_loss?? 0, 0)
                ]);;
            }

            if ($child->position == $result->direction) {
                $node->selected = 1;
                $node->class=["selected_node"];
            } else {
                $node->selected = 0;
            }
            
            $result->children[] = $node;
        }

        return $result;
    }

}
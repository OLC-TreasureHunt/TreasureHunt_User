<?php
namespace App\Services;

use App\Models\Master;
use App\Models\User;
use App\Models\BasicRateSetting;
use App\Enums\BinaryStatus;
use App\Enums\TreeType;
use App\Enums\UserBonusStatus;
use App\Repositories\BinaryRepositoryInterface;
use App\Repositories\ReferralRepositoryInterface;
use App\Services\Service;
use Log;


/**
 * Class ReferralService
 * @package App\Services
 */
class ReferralService extends Service {

    /**
     * @var ReferralRepositoryInterface
     */
    protected $referral;
    /**
     * @var Log
     */
    protected $logger;

    /**
     * @param BinaryRepositoryInterface $binary
     * @param Log $logger
     */
    public function __construct(ReferralRepositoryInterface $referral, Log $logger)
    {
        $this->logger = $logger;
        $this->referral = $referral;
    }

    public function homeRealTree($user_id) {
        $children = $this->referral->orderBy('id', 'asc')->filter([
            'parent_id' => $user_id,
            'status'    => BinaryStatus::Valid
        ])->get();
        $parent = User::findOrFail($user_id);

        $result = new \stdClass();
        $result->title = $parent->affiliate_id;
        $result->desc = trans('home.bet_month');
        $result->hp = '';
        $result->image_url = $parent->avatar;
        $result->extend = true;
        $result->text = '';
        $result->class = ['rootNode selected_node'];
        $result->selected = 0;
        
        $self = $this->referral->filter([
            'user_id' => $user_id
        ]);
        $result->text = trans('home.bets', [
            'amount' => _number_format($self[0]->own_bet?? 0, 0)
        ]);
        
        if (count($children) > 0) {
            $result->children = [];
        }

        $node = new \stdClass();
        $node->image_url = '';
        $node->extend = false;
        $node->title = trans('home.left_node');
        $parentInfo = $parent->userInfo()->type(TreeType::RealTree)->get()->last();
        if ($parentInfo) {
            $hp = $parentInfo->basic_bonus;
        } else {
            $hp = 0;
        }
        $node->hp = trans('home.realloss', [
            'amount' => _number_format($hp, 0)
        ]);
        $node->desc = trans('home.realagents', ['count' => count($children)]);
        $node->selected = 0;
        $node->text = '';
        $node->class=["child_node"];
        $result->children[] = $node;

        return $result;
    }

    public function list($request) {
        $filter = $request->all();

        if (!isset($filter['sort'])) {
            $filter['sort'] = 'created_at';
        }
        if (!isset($filter['order'])) {
            $filter['order'] = 'desc';
        }

        $current_id = $request->get('current');

        $children = User::find($current_id)->actvieChildrens()->paginate($filter['limit']);;
        foreach ($children as $child) {
            try {
                $user = User::find($child->id);
                $childrens = count($user->actvieChildrens()->get());
                $child->children_count = $childrens;
                $child->affiliate_id = $user->affiliate_id?? '';
            } catch (\Exception $e) {
                Log::channel('appsolution')->info($child);
            }
            
        }
        return $children;
    }

    public function stepFromTop($current) {
        $user = User::find($current);
        $referral = $user->referral;
        $parent_id = $referral->parent_id;

        if ($parent_id == 0) {
            return 1;
        } else {
            return 1 + $this->stepFromTop($parent_id);
        }
    }

}
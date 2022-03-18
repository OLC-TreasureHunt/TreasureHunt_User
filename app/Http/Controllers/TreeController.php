<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Services\ManualInputService;
use App\Services\BinaryService;
use Illuminate\Http\Request;


class TreeController extends Controller
{
    /**
     * @var BinaryService
     */
    protected $binary;
    protected $manualInput;

    /**
     * @param BinaryService $binary
     */
    public function __construct(BinaryService $binary, ManualInputService $manualInput) {
        $this->binary = $binary;
        $this->manualInput = $manualInput;
    }

    /**
     * Display a page
     * 
     * @return null
     */
    public function index() {
        $lastData = $this->manualInput->last();
        return view('tree')
            ->withLastData($lastData);
    }

    /**
     * Display a trees
     * 
     * @return Response
     */
    public function binary() {
        $tree = $this->binary->tree(Auth::user()->id);
        return $tree;
    }

    public function homeTree() {
        $tree = $this->binary->homeTree(Auth::user()->id);
        return $tree;
    }

    public function upward(Request $request) {
        $user_id = $request->route('id');
        $parent_id = User::find($user_id)->binary->parent_id;
        $tree = $this->binary->tree($parent_id);
        return $tree;
    }

    public function downward(Request $request) {
        $user_id = $request->route('id');
        $tree = $this->binary->tree($user_id);
        return $tree;
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Services\Binary\BinaryService;

class TreeController extends Controller
{
    /**
     * @var BinaryService
     */
    protected $binary;

    /**
     * @param BinaryService $binary
     */
    public function __construct(BinaryService $binary) {
        $this->binary = $binary;
    }

    /**
     * Display a page
     * 
     * @return null
     */
    public function index() {
        return view('tree');
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
}

<?php

namespace App\Http\Controllers;

use App\Services\NoticeService;
use Illuminate\Http\Request;

class NoticeController extends Controller
{

    /**
     * @var NoticeService
     */
    protected $notice;

    public function __construct(NoticeService $notice) {
        $this->notice = $notice;
    }

    public function index() {
        return view('notice');
    }

    public function list(Request $request) {
        return response()->json($this->notice->getNotice($request->all()));
    }

    public function read(Request $request) {
        return response()->json($this->notice->setReadMark($request->route('id')));
    }
}

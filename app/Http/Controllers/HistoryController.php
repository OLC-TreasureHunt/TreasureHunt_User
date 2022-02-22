<?php

namespace App\Http\Controllers;

use App\Models\GameHistory;
use App\Services\HistoryService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * @var HistoryService
     */
    protected $history;

    /**
     * @param BinaryService $binary
     */
    public function __construct(HistoryService $history) {
        $this->history = $history;
    }

    public function index() {
        return view('history');
    }

    public function game(Request $request) {
        return response()->json($this->history->gameHistory($request));
    }
}

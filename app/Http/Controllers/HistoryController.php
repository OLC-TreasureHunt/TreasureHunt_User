<?php

namespace App\Http\Controllers;

use App\Services\GameHistoryService;
use App\Services\BonusHistoryService;
use App\Services\CryptoSettingService;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    /**
     * @var GameHistoryService
     */
    protected $gameHistory;

    /**
     * @var BonusHistoryService
     */
    protected $bonusHistory;

    /**
     * @var CryptoSettingService
     */
    protected $cryptosetting;

    /**
     * @param GameHistoryService $binary
     * @param BonusHistoryService $binary
     */
    public function __construct(GameHistoryService $history1, BonusHistoryService $history2, CryptoSettingService $cryptosetting) {
        $this->gameHistory = $history1;
        $this->bonusHistory = $history2;
        $this->cryptosetting = $cryptosetting;
    }

    public function index(Request $request) {
        return view('history');
    }

    public function game(Request $request) {
        return response()->json($this->gameHistory->gameHistory($request));
    }

    public function bonus(Request $request) {
        return response()->json($this->bonusHistory->bonusHistory($request));
    }

    public function currency() {
        $currencies = $this->cryptosetting->all();

        $result = [];
        foreach ($currencies as $currency) {
            $result[$currency['currency_url']] = $currency;
        }

        return response()->json($result);
    }
}

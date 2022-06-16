<?php

namespace App\Http\Controllers;

use Auth;
use App\Enums\TreeType;
use App\Services\AllianceService;
use App\Services\ManualInputService;
use App\Models\ManualInput;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $manualInput;
    protected $allianceService;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ManualInputService $manualInput, AllianceService $allianceService)
    {
        $this->middleware('auth');
        $this->manualInput = $manualInput;
        $this->allianceService = $allianceService;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $lastData = $this->manualInput->last();
        $alliances = $this->allianceService->alliances();
        $binaryInfo = $user->userInfo()->type(TreeType::BinaryTree)->get()->last();
        $realInfo = $user->userInfo()->type(TreeType::RealTree)->get()->last();
        $binaryGradeUp = $user->gradeUp()->type(TreeType::BinaryTree)->get()->first();
        $binaryGradeDown = $user->gradeDown()->type(TreeType::BinaryTree)->get()->first();
        $realGradeUp    = $user->gradeUp()->type(TreeType::RealTree)->get()->first();
        $realGradeDown  = $user->gradeDown()->type(TreeType::RealTree)->get()->first();

        return view('home')
            ->withLastData($lastData)
            ->withUserInfo($user)
            ->withAlliances($alliances)
            ->withBinaryInfo($binaryInfo)
            ->withRealInfo($realInfo)
            ->withBinaryGradeUp($binaryGradeUp)
            ->withBinaryGradeDown($binaryGradeDown)
            ->withRealGradeUp($realGradeUp)
            ->withRealGradeDown($realGradeDown);
    }

}

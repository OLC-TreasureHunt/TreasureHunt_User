<?php

namespace App\Http\Controllers;

use Auth;
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
        // $alliances = $this->allianceService->alliances();

        return view('home')
            ->withLastData($lastData)
            ->withUserInfo($user);
            // ->withAlliances($alliances);
    }

    
}

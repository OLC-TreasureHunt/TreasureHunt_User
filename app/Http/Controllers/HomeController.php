<?php

namespace App\Http\Controllers;

use Auth;
use App\Services\ManualInputService;
use App\Models\ManualInput;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $manualInput;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ManualInputService $manualInput)
    {
        $this->middleware('auth');
        $this->manualInput = $manualInput;
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
        return view('home')
            ->withLastData($lastData)
            ->withUserInfo($user);
    }

    
}

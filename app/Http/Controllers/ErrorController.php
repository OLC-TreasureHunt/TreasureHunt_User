<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Master;
use App\Services\MaintenanceService;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    protected $maintenance;
    //

    public function __construct(MaintenanceService $maintenance) {
        $this->maintenance = $maintenance;
    }

    public function index() {
    }

    public function maintenance() {
        $content = $this->maintenance->content();
        Auth::logout();
        return view('maintence')->withContent($content);
    }

    public function nock() {
        $mode = Master::getValue('MAINTENANCE_MODE')?? 0;
        return response()->json(['mode' => $mode], 200);
    }
}

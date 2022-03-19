<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Master;
use App\Models\MaintenanceContent;
use Illuminate\Http\Request;

class ErrorController extends Controller
{
    //
    public function index() {
    }

    public function maintenance() {
        $content = MaintenanceContent::first()? MaintenanceContent::first()->content : '';
        Auth::logout();
        return view('maintence')->withContent($content);
    }

    public function nock() {
        $mode = Master::getValue('MAINTENANCE_MODE')?? 0;
        return response()->json(['mode' => $mode], 200);
    }
}

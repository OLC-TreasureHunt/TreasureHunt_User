<?php

namespace App\Http\Controllers;

use App\Services\FileService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    /**
     * @var FileService
     */
    protected $file;

    public function __construct(FileService $file) {
        $this->file = $file;
    }

    public function index() {
        return view('download');
    }

    public function files(Request $request) {
        return response()->json($this->file->paginate($request->all()));
    }
}

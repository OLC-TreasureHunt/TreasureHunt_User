<?php

namespace App\Http\Controllers;

use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * @var NewsService
     */
    protected $news;

    public function __construct(NewsService $news) {
        $this->news = $news;
    }

    public function index() {
        return view('news.index');
    }

    public function list(Request $request) {
        return response()->json($this->news->paginate($request->all()));
    }

    public function news(Request $request) {
        $this->news->increaseCount($request->route('id'));
        return view('news.news', [
            'news' => $this->news->find($request->route('id'))]
        );
    }

    public function popular(Request $request) {
        return response()->json($this->news->popular());
    }

    public function top(Request $request) {
        return response()->json($this->news->topNews());
    }
}

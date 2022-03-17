<?php

namespace App\Http\Controllers;

use App\Models\Term;
use App\Services\FaqService;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    protected $faq;
    public function __construct(FaqService $faq) {
        $this->faq = $faq;
    }

    public function index() {
        $faqs = $this->faq->faqs();
        return view('faq', ['faqs' => $faqs]);
    }

    public function terms() {
        $locale = app()->getLocale();

        $temp = Term::where('lang', $locale)->first();
        return view("term")->withData($temp);
    }
}

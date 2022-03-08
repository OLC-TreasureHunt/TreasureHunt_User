<?php

namespace App\Http\Controllers;

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
}

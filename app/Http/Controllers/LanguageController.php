<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function setLocale($locale)
    {
        $user = Auth::user();
        $lang_conf = config('lang');
        $languages = array_keys($lang_conf);
        
        if (! in_array($locale, $languages)) {
            abort(400);
        }

        Session::put('lang', $locale);
        if ($user) {
            $user->lang = $locale;
            $user->save();
            // User::updateLocale($user->id, $locale);
        }

        return back();
    }
}

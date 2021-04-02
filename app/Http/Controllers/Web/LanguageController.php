<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function switch($lang)
    {
        if (array_key_exists($lang, config('app.locales'))) {
            session()->put('appLocale', $lang);
        }
        return redirect()->back();
    }
}

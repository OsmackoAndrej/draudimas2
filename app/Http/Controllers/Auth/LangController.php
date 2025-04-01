<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function switchLang($lang, Request $request){
        $request->session()->put('lang', $lang);
        return redirect()->back();
    }
}

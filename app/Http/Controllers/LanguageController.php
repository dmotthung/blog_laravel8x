<?php

namespace App\Http\Controllers;

class LanguageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function switch_lg($language = 'en')
    {
        request()->session()->put('locale', $language);
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function Arabic(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language','arabic');
        return redirect()->back();
    }
    public function English(){
        Session()->get('language');
        Session()->forget('language');
        Session::put('language','english');
        return redirect()->back();
    }
}

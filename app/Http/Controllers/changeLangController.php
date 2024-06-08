<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;


class changeLangController extends Controller
{
    public function setlocale($locale){
        if (in_array($locale,['en','ar'])){
            App::setLocale($locale);
            Session::put('locale',$locale);
        }
        return back();
    }
}

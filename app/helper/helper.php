<?php
use Illuminate\Support\Facades\Cookie;
use App\Models\Translates;
function setLang($lang){
    if($lang == 'en'){
        $newLang = 'en';
    } else {
        $newLang = 'ro';
    }
    Cookie::queue('lang', $newLang);
}
function getLang(){
    return Cookie::get('lang') ?? "ro";
}

function traduceri($key){

    $traduceri = Translates::where('key', $key)->first();

    if(!$traduceri){
        return $key;
    }


    $traducere = (getLang() == 'ro') ? $traduceri->ro : $traduceri->en;
    return $traducere;
}

// traduceri('navbar_about');
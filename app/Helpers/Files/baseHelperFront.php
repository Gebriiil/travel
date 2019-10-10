<?php


// define link for assets of front ( styles and scripts )

if (!function_exists('furl')) {
    function furl()
    {
        return url('front');
    }
}


// language symbole
if (!function_exists('language_symbole')) {
    function language_symbole()
    {
        $lang = DB::table('languages')->where('id', language())->first();
        return $lang->symbol;
    }
}


// language symbole  in front
if (!function_exists('lang_front')) {
    function lang_front()
    {
        $lang = DB::table('languages')->where('symbol', Request::segment(1))->first();
        if ($lang) {
            return $lang->id;
        }
        $lang = DB::table('languages')->first();
        return $lang->id;

    }
}


if (!function_exists('current_lang')) {
    function current_lang()
    {
        $lang = DB::table('languages')->where('symbol', Request::segment(1))->first();
        if ($lang) {
            return $lang;
        }
        $lang = DB::table('languages')->first();
        return $lang;

    }
}



// get static pages
if (!function_exists('staticPages')) {
    function staticPages()
    {
        $staticPages = DB::table('static_pages')
            ->where('language_id', lang_front())
            ->where('type', 'static')
            ->where('deleted_at', null)
            ->get();
        return $staticPages;
    }
}


// get price
if (!function_exists('getPrice')) {

    function getPrice($amount)
    {
        $rate = session('convertionRate', 1);
        return round($amount * $rate,1);
    }
    /*array:5 [▼
"from" => "USD"
"to" => "EUR"
"amount" => 10
"convertionRate" => "0.89"
"convertedAmount" => "8.89"
]
//dump($value = session('CURRENCY', 'default'));
      // dd($value = session('convertionRate', 'default'));

       // Specifying a default value...
       // dd($value = session('CURRENCY', 'default'));
       //dd(getPrice('USD','USD',10));



   */
}
if (!function_exists('getPriceInDollar')) {

    function getPriceInDollar($amount)
    {
        $rate = session('convertionRate', '1');
        return round($amount / $rate,1);
    }
}



// get price
if (!function_exists('getCurrency')) {
    function getCurrency()
    {
        return session('CURRENCY', 'USD');
    }
}

// get site content home
if (!function_exists('site_content')) {
    function site_content()
    {
        $site_content = DB::table('settings')->where('language_id', lang_front())->first();
        if (!$site_content) {
            $site_content = DB::table('settings')->first();
        }
        return json_decode($site_content->site_content);
    }
}


// get languages
if (!function_exists('languages')) {
    function languages()
    {
        $languages = DB::table('languages')->orderBy('sort','asc')->get();
        return $languages;
    }
}


// number of words
if (!function_exists('num_words')) {
    function num_words($word, $num = 2, $end = '')
    {
        return \Str::Words($word, $num, $end);
    }
}


//return a value from json object with key
if (!function_exists('json_value')) {
    function json_value($json, $key)
    {
        
        if ($json) {
            $data = json_decode($json);
            if (property_exists($data,$key)) {
                return $data->$key;
            }else{
                return '';
            }
        }
    }
}

// return json object
if (!function_exists('json')) {
    function json_object($json)
    {
        if ($json) {
            $data = json_decode($json);
            return $data;
        }
    }
}


// get seo content home
if (!function_exists('seo_content')) {
    function seo_content()
    {
        $seo_content = DB::table('settings')->where('language_id', lang_front())->first();
        if (!$seo_content) {
            $seo_content = DB::table('settings')->first();
        }
        return json_decode($seo_content->seo);
    }
}
if(!function_exists('murl')){
    function murl($url=null){
        return url( app()->getLocale()  .'/'. $url);
    }
}






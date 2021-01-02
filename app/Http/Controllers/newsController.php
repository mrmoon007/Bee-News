<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class newsController extends Controller
{


    public function news()
    {
        $apidata= Http::get('http://api.mediastack.com/v1/news?access_key=61b5d9c524a3dd549a55194ac1fa1cf2')->json();

        return view('api',['apidata'=>$apidata]);

        //['apidata'=>$apidata]
        //compact('apidata')
    }

}

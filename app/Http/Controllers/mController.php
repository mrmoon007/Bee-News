<?php

namespace App\Http\Controllers;

use App\postModels;
use Illuminate\Http\Request;

class mController extends Controller
{
    public function list(){
        return postModels::all();
    }
}

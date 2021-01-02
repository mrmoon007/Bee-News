<?php

namespace App\Http\Controllers;

use App\postModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class myCollectionController extends Controller
{
    //
    public function create()
    {
        return view('news');
    }

    public function store( Request $request){

        //$adata=Auth::user();
        postModels::insert([
            'title'=>$request->title ,
            'descrption'=>$request->description ,
            'author'=>Auth::user()->name,
            'category'=>$request->category ,
            'created_at'=> Carbon::now(),
        ]);
        return view('news');
    }
    public function show()
    {
        $allpost= postModels::all();
        return view('post',compact('allpost'));
    }
    public function search(){
        $search=$_GET['searchdata'];
        $searchitem=postModels::where('author','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->orWhere('title','LIKE','%'.$search.'%')->get();

        return view('search',compact('searchitem'));
    }
}

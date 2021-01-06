<?php

namespace App\Http\Controllers;

use App\postModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class myCollectionController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create()
    {
        return view('create');
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
        ini_set('max_execution_time', 300);
        $allpost= postModels::all();
        $apidata= Http::get('http://api.mediastack.com/v1/news?access_key=61b5d9c524a3dd549a55194ac1fa1cf2')->json();
        $data=$apidata['data'];
        return view('home',compact(['allpost','data']));
    }
    public function search(){
        $search=$_GET['searchdata'];
        $searchitem=postModels::where('author','LIKE','%'.$search.'%')->orWhere('category','LIKE','%'.$search.'%')->orWhere('title','LIKE','%'.$search.'%')->get();

        return view('search',compact('searchitem'));
    }
    public function deletePost($id)
    {
        $data= postModels::find($id);
        $data->delete();
        return redirect()->back();
    }
}

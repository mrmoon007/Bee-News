<?php

namespace App\Http\Controllers;

use App\postModels;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use app\User;


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

    public function password()
    {
        return view('password');
    }

    public function passwordUpdate(Request $request)
    {
        $id= Auth::user()->id;
        $db_password= Auth::user()->password;
        $old_password= $request->old_Password;
        $new_password= $request->new_password;
        $confirm_password= $request->password_confirmation;

        if(Hash::check($old_password, $db_password))
        {

            if($new_password==$confirm_password)
            {
                user::find($id)->update([
                    'password'=>Hash::make($new_password)
                ]);
                Auth :: logout();
                return redirect()->route('login');

            }
            else{
                return redirect()->back()->with('new-sms','new password and confirm password not match');
            }
        }
        else
        {
            dd($id);
            return redirect()->back()->with('old-sms','Old password not match');
        }
     }
}

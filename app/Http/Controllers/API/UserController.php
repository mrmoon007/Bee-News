<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\postModels;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;

class UserController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        if (Auth::attempt(['userName' => request('userName'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            return response()->json(['success' => $success], $this->successStatus);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'country' => 'required',
            'userName' => 'required',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success' => $success], $this->successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
    public function post()
    {

        $post = postModels::all();
        return response()->json(['success' => $post], $this->successStatus);
    }

    public function createPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'author' => 'required',
            'category' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $post= new postModels;
        $post->title=$request->title;
        $post->descrption=$request->discription;
        $post->author=$request->author;
        $post->category=$$request->category;
        $post->save();
    }


    public function deletePost(Request $request, $id)
    {
        $data= postModels::find($id);
        $data->delete();

        return response()->json($data);
    }



}

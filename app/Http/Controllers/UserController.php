<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = UserModel::all();
        $data = compact('user');
        
        //print_r(compact($user));
        echo $request->session()->get('email');
        return view('userList')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url('/user');
        $title = "User Registration Form";
        $tu = "R";
        $data = compact('url','title','tu');
        return view('register')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request -> validate(
            [
                'fname'=>'required',
                'email'=>'required|email',
                'password'=>'required',
                'cpassword'=>'required|same:password',
            ]
            );
            
        print_r($request->All());
        $fname = $request->file('pic')->store('upload');    
        $user = new UserModel();

        $user->name = $request->fname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->pic = $fname;    
        $user->save();

        //return redirect('/');
    }

    public function login(){
        return view('login');
    }

    public function home(Request $request){

        $request -> validate(
            [
                'email'=>'required|email',
                'password'=>'required',
            ]
            );

            $result = UserModel::where('email',$request->email)->where('password',$request->password)->get();
            //echo "<pre>";
            $res = $result->toArray();
            if($res){
                $request->session()->put('email',$request->email);
                return redirect('/');
            }
            else{
                echo "Wrong";
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo "This is register page.";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = UserModel::find($id);
        $url = url('/update').'/'.$id;
        $title = "Update User Details";
        $tu = "U";
        $data = compact('user','url','title','tu');
        return view('register')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = UserModel::find($id);
        $user->name = $request->fname;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        return redirect('/');
        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = UserModel::find($id); 
        $user->delete();
        return redirect('/');
    }
}

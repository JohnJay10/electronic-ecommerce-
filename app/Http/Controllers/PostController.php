<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function post(){
        return view('Post.index');
    }

    public function admin(Request $request){
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|unique:users'
        ]);
        $role = RoleType::where('id','admin')->first();
        if ($role){
            if ($request->ajax())
                return response()->json(['message'=>'admin role type does not exist'], 400);
            else
                return back()->with(['message'=>'admin role does not exist']);
        }
       
    }
    public function getpost(){
        return view('Post.get')->with('Success','Post Successfully Saved');
    }


    public function ReceiveEmailForPost(){
        $post = Post::paginate(5);
        return view('Post.receivedemail')->with('Success', 'Email Sucessfully Received');
    }

    


}

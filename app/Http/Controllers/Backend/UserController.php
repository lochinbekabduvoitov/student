<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\User;

class UserController extends Controller
{
    public function UserView()
    {

        $data['alldata']=User::all();
        return view('backend.user.view_user', $data);
    }

    public function UserAdd ()
    {
        return view('backend.user.add_user');
    }

    public function UserStore(Request $request)
    {
        $validatedData =  $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data= new User();
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->password=bcrypt($request->password);
        $data->save();

        $notification =[
            'message' => 'User Insarted Successful',
            'alert-type' =>'success'
        ];

        return redirect()->route('users.view')->with($notification);
    }

    public function UserEdit(Request $request , $id){

        $data=User::find($id);

        return view('backend.user.edit_users', compact('data'));
    }

    public function UserUpdate(Request $request ,$id){
        $validatedData =  $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
        ]);

        $data= User::find($id);
        $data->usertype=$request->usertype;
        $data->name=$request->name;
        $data->email=$request->email;
        $data->save();

        $notification =[
            'message' => 'User Edit Successful',
            'alert-type' =>'success'
        ];

        return redirect()->route('users.view')->with($notification);
    }

    public function UserDelete($id){
        $data=User::find($id);
        $data->delete();

        $notification =[
            'message' => 'User Delete Successful',
            'alert-type' =>'error'
        ];

        return redirect()->route('users.view')->with($notification);
    }
}

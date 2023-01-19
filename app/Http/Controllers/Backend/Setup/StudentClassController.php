<?php

namespace App\Http\Controllers\Backend\Setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;

class StudentClassController extends Controller
{
    public function ViewStudent(){

        $data['allData'] = StudentClass::all();
        return view('backend.setup.student_class.view_class',$data);
    }

    public function StudentClassAdd(){
        return view('backend.setup.student_class.add_class');
    }

    public function StudentClassStore(Request $request){

        $validatedData =  $request->validate([
            'name' => 'required',
        ]);

        $data = new StudentClass();
        $data->name=$request->name;

        $data->save();

        $notification=[
            'message'=>'User Profile Update Successfully',
            'alert-type'=>'success'
        ];


        return redirect()->route('student.class.view')->with($notification);
    }
}

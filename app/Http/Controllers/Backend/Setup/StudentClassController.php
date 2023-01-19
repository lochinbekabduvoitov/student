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
            'message'=>'User Name  Successfully',
            'alert-type'=>'success'
        ];


        return redirect()->route('student.class.view')->with($notification);
    }

    public function StudentClassEdit(Request $request, $id){

        $editdata=StudentClass::find($id);

        return view('backend.setup.student_class.student_class_edit', \compact('editdata'));

    }

    public function StudentClassUpdate(Request $request, $id){


        $validatedData =  $request->validate([
            'name' => 'required',
        ]);
        $data =  StudentClass::find($id);

        $data->name=$request->name;

        $data->save();

        $notification=[
            'message'=>'Update Name Successfully',
            'alert-type'=>'success'
        ];

        return redirect()->route('student.class.view')->with($notification);
    }
}

<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //


//    sir ton code in API
// public function store(Request $request)
//    {
//        $event = new Events();
//        $event->name = $request->name;
//        $event->description = $request->description;
//        $event->save();
//
//        return $event->toJson();
//    }

    //insert datas using API
    public function store(Request $request){

        $students = new Student();
          //col name fn,ln,em,ps
        $students->fname = $request->input('fname');
        $students->lname = $request->input('lname');
        $students->email = $request->input('email');
        $students->password = $request->input('password');
        $students->save();

        return response()->json($students); //

    }

    //get data
    public function show($id){

        $student = Student::find($id);//sme to get

        return response()->json($student);//api
    }



    //get by data by id
    public function showbyid($id){

//        $student = Student::where('id',$id)->first();
             $student= Student::find($id); // same function in the tp
        return response()->json($student);

    }

    public function update(Request $request , $id){
     //we dont use $data = $request->all();
        //$student->fname = $data['fname'];
//        dd($request->all());

        $student = Student::find($id);
        $student->fname = $request->input('fname');
        $student->lname = $request->input('lname');
        $student->email = $request->input('email');//input should be eqaul to the column name
        $student->password = $request->input('password');
        $student->save();//instead of upate we use save, cause we use find()

        return response()->json($student);

    }
    public function index(){

        $students = Student::get();
        return response()->json($students);

    }


    public function destroy($id){

        $student= Student::where('id',$id)->delete();
        return response()->json($student);

    }




//in the post man, when you insert that where you use the
//header section and set the ket to Content-type and value to application/json


}

<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    public function index(){
        return view('student');

    }

    public function store(Request $request){
        // $validator = Validator::make($request->all(),[
                    // 'name'=> 'required',
        // ]);






        $student = new Student;
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->course = $request->input('course');
        if($request->hasFile('image')){
            // $file=$request->file('image');
            // $extention = $file->getClientOriginalExtension();
            // $fileName = time().'.'.$extention;
            // $file->move(public_path('uploads/students/',$fileName));
            $image = $request->file('image');
            $file_name  = time().'.'.$image->getClientOriginalExtension();
            $image->move( public_path('images/student'),$file_name);
            $student->image = $file_name;
        }
        $student->save();


        if($student){
            return response()->json([
                'message'=> 'Successfully added',
                // 'uploaded_image'=>'<img src="/images/'.$file_name.'">
            ]);
        }else{
            return response()->json([
                'message' => 'error '
            ]);
        }
    }

    public function fetchStudent(){
        $students = Student::all();
        return response()->json([
            "students"=>$students,
        ]);
    }

    public function deleteStudent($id){

        $student = Student::find($id);
        if($student){
            $student->delete();
            return response()->json([
                'message'=>'deleted succesfully',
            ]);
        }
        return response()->json([
            'message'=>'Something went wrong',
        ]);

    }

    public function image_upload(Request $request){
        {
            // $validation = Validator::make($request->all(),[
            //     'image' => 'required|image|max:2048'
            // ]);
                $student_image =new Image;
            if($request->hasFile('image'))
            {
                $image = $request->file('image');
                $file_name  = time().'.'.$image->getClientOriginalExtension();
                $image->move( public_path('images'),$file_name);
                $student_image->image = $file_name;

            }

            $student_image->save();
            if($student_image){
                return response()->json([
                    'message'=> 'image uploaded Successfully',
                    // 'uploaded_image'=>'<img src="/images/'.$file_name.'">
                ]);
            }else{
                return response()->json([
                    'message' => 'error in upload image'
                ]);

            }

        }
    }
}

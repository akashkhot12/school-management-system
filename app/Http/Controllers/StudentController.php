<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
      //  $students = Student::with('student')->paginate(5);
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
        'SR'=>'required',
        'FirstName'=>'required',
        'LastName'=>'required',
        'Age'=>'required',
        'Speciallity'=>'required',
        ]);
        $student = new Student();
        $student->SR = $request->input('SR');
        $student->FirstName = $request->input('FirstName');
        $student->LastName = $request->input('LastName');
        $student->Age = $request->input('Age');
        $student->Speciallity = $request->input('Speciallity');
        $student->save();
        return redirect()->route('index')->with('msg',"Add Successfully");


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('Student',['students'=>$students,'student'=>$student,'layout'=>'show']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('Student',['students'=>$students,'student'=>$student,'layout'=>'edit']);
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
        $request->validate([
            'SR'=>'required',
            'FirstName'=>'required',
            'LastName'=>'required',
            'Age'=>'required',
            'Speciallity'=>'required',
            ]);
        $student = Student::find($id);
        $student->SR = $request->input('SR');
        $student->FirstName = $request->input('FirstName');
        $student->LastName = $request->input('LastName');
        $student->Age = $request->input('Age');
        $student->Speciallity = $request->input('Speciallity');
        $student->save();
        return redirect('/index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //         $student = Student::find($id);
    //         $student->delete();
    //         return redirect('/')->with('msg',"delete successfully");
    //     }

        public function delete($id)
    {
            $student = Student::find($id);
            $student->delete();
            return redirect('/index')->with('msg',"delete successfully");
        }
    }


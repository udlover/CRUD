<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequet;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $std = Student::paginate(5);
        return view('website.index', compact('std'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('website.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $image = $request->file('image');
        $image_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('upload'), $image_name);

        $obj = new Student();
        $obj->name = $request->name;
        $obj->email = $request->email;
        $obj->address = $request->address;
        $obj->image = $image_name;
        $result = $obj->save();

        // we can also use this line to store data
        // $result = Student::create($request->all());

        if ($result) {
            session()->flash('sms', 'Data Submited');
            return redirect()->route('student.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        return view('website.student_data', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('website.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //old image name
        $my_image = $request->my_image;

        //new image
        $image = $request->file('image');

        if ($image != "") {
            $request->validate([
                "name" => "required",
                "email" => "required|email",
                "address" => "required",
                "image" => "image"
            ]);
            $my_image = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload'), $my_image);
        } else {
            $request->validate([
                "name" => "required",
                "email" => "required|email",
                "address" => "required",
            ]);
        }
        $student->update([
            "name" => $request->name,
            "email" => $request->email,
            "address" => $request->address,
            "image" => $my_image,
        ]);
        return redirect()->route('student.index')->with('success', 'Data Updated');


        // old code for update if we not have image
        // $student->update($request->all());
        // return redirect()->route('student.index')->with('success', 'Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('error', 'Record Deleted');
    }
}

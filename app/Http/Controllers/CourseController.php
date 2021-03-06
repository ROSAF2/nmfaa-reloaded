<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('id')->get();
        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $schools = School::orderBy('name')->get();
        return view('courses.create',compact('schools'));
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
            'id' => 'unique:App\Models\Course,id',
            'name'=>'required',
            'school_id'=>'required',
        ]);

        $course=new Course();
        $course->id = $request->input('id');
        $course->name = $request->input('name');
        $course->school_id = $request->input('school_id');
        $course->save();
        return redirect('/courses')->with('success', 'Course Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $course=Course::find($id);

        return view('courses.show', compact('course'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
        $schools = School::orderBy('name')->get();
        return view('courses.edit', compact('course', 'schools'));   
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
            'id'=>'required',
            'name'=>'required',
            'school_id'=>'required',
        ]);

        $course = Course::find($id);
        $course->id = $request->input('id');
        $course->name = $request->input('name');
        $course->school_id = $request->input('school_id');
        $course->save();

        return redirect('/courses')->with('success', 'Course Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course = Course::find($id);
        $course->delete();
        return redirect('/courses')->with('success', 'Course Deleted');
    }
}

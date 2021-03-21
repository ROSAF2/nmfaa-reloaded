<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Course;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $assessments = Assessment::orderBy('course_id')->orderBy('id')->get();
        return view('assessments.index', compact('assessments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses = Course::all();
        return view('assessments.create', compact('courses'));
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
            'name' => 'required',
            'date'=>'required',
            'course_id'=>'required',
        ]);

        $assessment = new Assessment();
        $assessment->name = $request->input('name');
        $assessment->date = $request->input('date');
        $assessment->course_id = $request->input('course_id');
        $assessment->save();
        return redirect('/assessments')->with('success', 'Assessment Created');
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
        $assessment=Assessment::find($id);

        return view('assessments.show', compact('assessment'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $courses = Course::all();
        $assessment = Assessment::find($id);
        return view('assessments.edit', compact('assessment','courses'));
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
            'name'=>'required',
            'date'=>'required',
            'course_id'=>'required',
        ]);

        $assessment = Assessment::find($id);
        $assessment->name = $request->input('name');
        $assessment->date = $request->input('date');
        $assessment->course_id = $request->input('course_id');
        $assessment->save();

        return redirect('/assessments')->with('success', 'Assessment Updated');
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
        $assessment = Assessment::find($id);
        $assessment->delete();
        return redirect('/assessments')->with('success', 'Assessment Deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semesters = Semester::where('user_id', /*Auth::id()*/1)->orderBy('name')->get();
        return view('semesters.index', compact('semesters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('semesters.create');
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
            'start_date' => 'required',
            'weeks_first_term'=>'required',
        ]);

        $semester = new Semester();
        $semester->name = $request->input('name');
        $semester->start_date = $request->input('start_date');
        $semester->weeks_first_term = $request->input('weeks_first_term');
        $semester->user_id = /*Auth::id()*/ 1;
        $semester->save();

        return redirect('/semesters')->with('success', 'Semester Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $semester = Semester::find($id);
        return view('semesters.show', compact('semester'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $semester = Semester::find($id);
        return view('semesters.edit', compact('semester'));
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
            'name' => 'required',
            'start_date' => 'required',
            'weeks_first_term'=>'required',
        ]);

        $semester = Semester::find($id);
        $semester->name = $request->input('name');
        $semester->start_date = $request->input('start_date');
        $semester->weeks_first_term = $request->input('weeks_first_term');
        $semester->user_id = /*Auth::id()*/ 1;
        $semester->save();

        return redirect('/semesters')->with('success', 'Semester Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $semester = Semester::find($id);
        $semester->delete();
        return redirect('/semesters')->with('success', 'Semester Deleted');
    }
}

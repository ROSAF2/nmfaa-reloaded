<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\PublicHoliday;

class PublicHolidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publicHolidays = PublicHoliday::orderBy('school_id')->orderBy('date')->get();
        return view('publicHolidays.index', compact('publicHolidays'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::orderBy('name')->get();
        return view('publicHolidays.create',compact('schools'));
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
            'date' => 'required',
            'location_affected'=>'required',
            'school_id'=>'required',
        ]);

        $publicHoliday = new PublicHoliday();
        $publicHoliday->name = $request->input('name');
        $publicHoliday->date = $request->input('date');
        $publicHoliday->location_affected = $request->input('location_affected');
        $publicHoliday->school_id = $request->input('school_id');
        $publicHoliday->save();

        return redirect('/publicHolidays')->with('success', 'Public Holiday Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $publicHoliday = PublicHoliday::find($id);

        return view('publicHolidays.show', compact('publicHoliday'));   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicHoliday = PublicHoliday::find($id);
        $schools = School::orderBy('name')->get();
        return view('publicHolidays.edit', compact('publicHoliday', 'schools'));  
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
            'date' => 'required',
            'location_affected'=>'required',
            'school_id'=>'required',
        ]);

        $publicHoliday = PublicHoliday::find($id);
        $publicHoliday->name = $request->input('name');
        $publicHoliday->date = $request->input('date');
        $publicHoliday->location_affected = $request->input('location_affected');
        $publicHoliday->school_id = $request->input('school_id');
        $publicHoliday->save();

        return redirect('/publicHolidays')->with('success', 'Public Holiday Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicHoliday = PublicHoliday::find($id);
        $publicHoliday->save();
        return redirect('/publicHolidays')->with('success', 'Public Holiday Deleted');
    }
}

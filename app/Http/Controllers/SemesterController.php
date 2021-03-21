<?php

namespace App\Http\Controllers;

use App\Models\Semester;
use App\Models\Week;
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
            'holiday_weeks'=>'required',
            'working_weeks'=>'required',
        ]);

        $semester = new Semester();
        $semester->name = $request->input('name');
        $semester->start_date = $request->input('start_date');
        $semester->weeks_first_term = $request->input('weeks_first_term');
        $semester->holiday_weeks = $request->input('holiday_weeks');
        $semester->working_weeks = $request->input('working_weeks');
        $semester->user_id = /*Auth::id()*/ 1;
        $semester->save();

        SemesterController::storeWeeks($semester); // Generates and saves all the required weeks

        return redirect('/semesters')->with('success', 'Semester Created');
    }

    public function storeWeeks(Semester $semester)
    {
        date_default_timezone_set('NZ'); // Set Timezone

        $total_weeks = $semester->working_weeks + $semester->holiday_weeks; // Calculate total weeks in a semester

        // Create Weeks for this semester
        for ($i=0; $i < $total_weeks; $i++) { 

            $week = new Week();
            $week->start_date = date('Y-m-d', strtotime($semester->start_date . " +" . ($i * 7) . " day"));
            $week->semester_id = $semester->id;

            // If holiday week
            if ($semester->weeks_first_term < ($i + 1) && ($i + 1) <= ($semester->weeks_first_term + $semester->holiday_weeks)) {
                $week->is_holiday_week = true;
                $week->number = null;
            }
            // If working week
            else {
                $week->is_holiday_week = false;
                if (($i + 1) <= $semester->weeks_first_term) $week->number = $i + 1; // If first term
                else $week->number = ($i + 1) - $semester->holiday_weeks; // If second term
            }
            $week->save();
        }
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

        // Calculate current week
        $weeks = $semester->weeks;
        $dateNow = date(now());
        // $dateNow = "2021-07-03";
        $currentWeekId = null;

        for ($i=0; $i < $weeks->count(); $i++) { 
            // We define these two variables for readability
            $start =$weeks[$i]->start_date;
            $end = date('Y-m-d', strtotime($start . " +7 day"));

            if ($start <= $dateNow && $dateNow < $end) {
                $currentWeekId = $weeks[$i]->id;
                break;
            }
        }

        return view('semesters.show', compact('semester','currentWeekId'));   
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
            'holiday_weeks'=>'required',
            'working_weeks'=>'required',
        ]);

        $semester = Semester::find($id);
        $semester->name = $request->input('name');
        $semester->start_date = $request->input('start_date');
        $semester->weeks_first_term = $request->input('weeks_first_term');
        $semester->holiday_weeks = $request->input('holiday_weeks');
        $semester->working_weeks = $request->input('working_weeks');
        $semester->user_id = /*Auth::id()*/ 1;
        $semester->save();

        SemesterController::updateWeeks($semester);

        return redirect('/semesters')->with('success', 'Semester Updated');
    }

    public function updateWeeks($semester)
    {
        // Destroy current weeks
        $weeks = Week::where('semester_id', 'LIKE', $semester->id)->get();
        foreach ($weeks as $week) {
            $week->delete();
        }
        // Creates new weeks
        SemesterController::storeWeeks($semester); // Generates and saves all the required weeks
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

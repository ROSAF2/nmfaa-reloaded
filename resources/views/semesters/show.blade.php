@extends('layouts.app')
@section('title', 'Show Semester')
@section('content')

<a href="{{route('semesters.index')}}">Back</a>
<br>
<a href="{{route('semesters.edit', $semester->id)}}">Edit Semester</a>
<br>

 <form action="{{route('semesters.destroy', $semester->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>



<h2>Semester: {{$semester->name}} : {{$semester->start_date}} : {{$semester->weeks_first_term}} {{$semester->school}}</h2>


<h3>Timetable</h3>
<h4>{{$currentWeekId == null ? "The current date '" . date(now()) . "' falls outside of this semester" : ""}}</h4>

<table>
    <thead>
        <tr>
            <th>Number</th><th>Start Date</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($semester->weeks as $week)
            <tr style="{{$currentWeekId == $week->id ? 'background-color: red' : ''}}">
                <td>{{$week->is_holiday_week ? "Holiday" : $week->number}}</td><td>{{$week->start_date}}</td>
            </tr>
        @endforeach
    </tbody>
</table>



@endsection

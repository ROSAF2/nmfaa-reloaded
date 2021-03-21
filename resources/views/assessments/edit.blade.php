@extends('layouts.app')
@section('title', 'Edit Assessment')
@section('content')

<a href="{{route('assessments.show',$assessment->id)}}">Back</a>
<br>
<form action="{{route('assessments.update', $assessment->id)}}" method='POST'>
    @csrf
    @method('PATCH')
    <p>Enter assessment name</p>
    <label><input type='text' name='name' value="{{$assessment->name}}"></label><br>

    <p>Enter date of the assessment</p>
    <label><input type='date' name='date' value="{{$assessment->date}}"></label><br>

    <p>Select course</p>
    <select name="course_id">
        <option value="" disabled selected>-</option> 
        @foreach ($courses as $course)
            <option {{$assessment->course_id == $course->id ? "selected" : "" }} value="{{$course->id}}">{{$course->id}}: {{$course->name}}</option>
        @endforeach
    </select>

    <input type='submit' name='submit' value='Submit'>        
</form>

@endsection
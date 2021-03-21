@extends('layouts.app')
@section('title', 'Create Assessment')
@section('content')

<a href="{{route('assessments.index')}}">Back</a>
<br>
<h3>Create Assessment</h3>
<form action="{{route('assessments.store')}}" method="POST">
    @csrf
    <p>Enter name of the assessment</p>
    <label><input type='text' name='name' value="{{old('name')}}"></label><br>

    <p>Enter assessment date</p>
    <label><input type='date' name='date' value="{{old('date')}}"></label><br>

    <p>Select course</p>
    <select name="course_id">
        <option value="" disabled selected>-</option> 
        @foreach ($courses as $course)
            <option {{old('course_id') == $course->id ? "selected" : "" }} value="{{$course->id}}">{{$course->id}}: {{$course->name}}</option>
        @endforeach
    </select>
    <br>
    <input type='submit' name='submit' value='Submit'>
</form>

@endsection
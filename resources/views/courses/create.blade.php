@extends('layouts.app')
@section('title', 'Create Course')
@section('content')

<a href="{{route('courses.index')}}">Back</a>
<br>
<h3>Create Course</h3>
<form action="{{route('courses.store')}}" method="POST">
    @csrf
    <p>Enter course id</p>
        <label><input type='text' name='id' value="{{old('id')}}"></label><br>

    <p>Enter Name of the course</p>
    <label><input type='text' name='name' value="{{old('name')}}"></label><br>

    <p>Select School</p>
    <select name="school_id">
        <option value="" disabled selected>-</option> 
        @foreach ($schools as $school)
            <option {{old('school_id') == $school->id ? "selected" : "" }} value="{{$school->id}}">{{$school->name}}</option>
        @endforeach
    </select>

    <input type='submit' name='submit' value='Submit'>
</form>

@endsection
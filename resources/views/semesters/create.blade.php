@extends('layouts.app')
@section('title', 'Create Semester')
@section('content')

<a href="{{route('semesters.index')}}">Back</a>
<br>
<h3>Create Semester</h3>
<form action="{{route('semesters.store')}}" method="POST">
    @csrf
    <p>Enter name of the Semester</p>
    <label><input type='text' name='name' value="{{old('name')}}"></label><br>

    <p>Enter Semester date</p>
    <label><input type='date' name='start_date' value="{{old('start_date')}}"></label><br>

    <p>Enter number of weeks for the first term</p>
    <label><input type='number' name='weeks_first_term' value="{{old('weeks_first_term')}}"></label><br>

    <p>Select School</p>
    <select name="school_id">
        <option value="" disabled selected>-</option> 
        @foreach ($schools as $school)
            <option {{old('school_id') == $school->id ? "selected" : "" }} value="{{$school->id}}">{{$school->name}}</option>
        @endforeach
    </select>

    <br>
    <input type='submit' name='submit' value='Submit'>
</form>

@endsection
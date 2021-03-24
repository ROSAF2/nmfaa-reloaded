@extends('layouts.app')
@section('title', 'Edit Semester')
@section('content')

<a href="{{route('semesters.show',$semester->id)}}">Back</a>
<br>
<form action="{{route('semesters.update', $semester->id)}}" method='POST'>
    @csrf
    @method('PATCH')

    <p>Enter name of the Semester</p>
    <label><input type='text' name='name' value="{{$semester->name}}"></label><br>

    <p>Enter Semester date</p>
    <label><input type='date' name='start_date' value="{{$semester->start_date}}"></label><br>

    <p>Enter number of weeks for the first term</p>
    <label><input type='number' name='weeks_first_term' value="{{$semester->weeks_first_term}}"></label><br>

    <p>Select School</p>
    <select name="school_id">
        <option value="" disabled selected>-</option> 
        @foreach ($schools as $school)
            <option {{$semester->school_id == $school->id ? "selected" : "" }} value="{{$school->id}}">{{$school->name}}</option>
        @endforeach
    </select>

    <input type='submit' name='submit' value='Submit'>        
</form>

@endsection
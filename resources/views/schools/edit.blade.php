@extends('layouts.app')
@section('title', 'Edit School')
@section('content')

<a href="{{route('schools.show',$school->id)}}">Back</a>
<br>
<form action="{{route('schools.update', $school->id)}}" method='POST'>
    @csrf
    @method('PATCH')

    <p>Enter name of the School</p>
    <label><input type='text' name='name' value="{{$school->name}}"></label><br>

    <p>Enter number of holiday weeks that a semester for this school has</p>
    <label><input type='number' name='holiday_weeks' value="{{$school->holiday_weeks}}"></label><br>

    <p>Enter number of working weeks that a semester for this school has</p>
    <label><input type='number' name='working_weeks' value="{{$school->working_weeks}}"></label><br>

    <input type='submit' name='submit' value='Submit'>        
</form>

@endsection
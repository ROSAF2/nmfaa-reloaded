@extends('layouts.app')
@section('title', 'Create School')
@section('content')

<a href="{{route('schools.index')}}">Back</a>
<br>
<h3>Create School</h3>
<form action="{{route('schools.store')}}" method="POST">
    @csrf
    <p>Enter name of the School</p>
    <label><input type='text' name='name' value="{{old('name')}}"></label><br>

    <p>Enter number of holiday weeks that a semester for this school has</p>
    <label><input type='number' name='holiday_weeks' value="{{old('holiday_weeks')}}"></label><br>

    <p>Enter number of working weeks that a semester for this school has</p>
    <label><input type='number' name='working_weeks' value="{{old('working_weeks')}}"></label><br>

    <br>
    <input type='submit' name='submit' value='Submit'>
</form>

@endsection
@extends('layouts.app')
@section('title', 'Create Public Holiday')
@section('content')

<a href="{{route('publicHolidays.index')}}">Back</a>
<br>
<h3>Create Public Holiday</h3>
<form action="{{route('publicHolidays.store')}}" method="POST">
    @csrf
        <p>Enter Name</p>
        <label><input type='text' name='name' value="{{old('name')}}"></label><br>

        <p>Enter date</p>
        <label><input type='date' name='date' value="{{old('date')}}"></label><br>

        <p>Enter location affected</p>
        <label><input type='text' name='location_affected' value="{{old('location_affected')}}"></label><br>

        <input type='submit' name='submit' value='Submit'>
</form>

@endsection
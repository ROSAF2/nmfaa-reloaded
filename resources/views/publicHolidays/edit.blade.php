@extends('layouts.app')
@section('title', 'Edit Public Holiday')
@section('content')

<a href="{{route('publicHolidays.show',$publicHoliday->id)}}">Back</a>
<br>
<form action="{{route('publicHolidays.update', $publicHoliday->id)}}" method='POST'>
    @csrf
    @method('PATCH')
    <p>Enter Name</p>
    <label><input type='text' name='name' value="{{$publicHoliday->name}}"></label><br>

    <p>Enter date</p>
    <label><input type='date' name='date' value="{{$publicHoliday->date}}"></label><br>

    <p>Enter location affected</p>
    <label><input type='text' name='location_affected' value="{{$publicHoliday->location_affected}}"></label><br>

    <p>Select School</p>
    <select name="school_id">
        <option value="" disabled selected>-</option> 
        @foreach ($schools as $school)
            <option {{$publicHoliday->school_id == $school->id ? "selected" : "" }} value="{{$school->id}}">{{$school->name}}</option>
        @endforeach
    </select>

    <input type='submit' name='submit' value='Submit'>        
</form>

@endsection
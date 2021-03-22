@extends('layouts.app')
@section('title', 'Show Public Holiday')
@section('content')

<a href="{{route('publicHolidays.index')}}">Back</a>
<br>
<a href="{{route('publicHolidays.edit', $publicHoliday->id)}}">Edit Public Holiday</a>
<br>

 <form action="{{route('publicHolidays.destroy', $publicHoliday->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>



<h2>Public Holiday: {{$publicHoliday->date}} {{$publicHoliday->name}} {{$publicHoliday->location_affected}}</h2>

@endsection

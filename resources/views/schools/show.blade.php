@extends('layouts.app')
@section('title', 'Show School')
@section('content')

<a href="{{route('schools.index')}}">Back</a>
<br>
<a href="{{route('schools.edit', $school->id)}}">Edit School</a>
<br>

 <form action="{{route('schools.destroy', $school->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>


<h2>School: {{$school->name}} : {{$school->holiday_weeks}} : {{$school->working_weeks}}</h2>




@endsection

@extends('layouts.app')
@section('title', 'Show Course')
@section('content')

<a href="{{route('courses.index')}}">Back</a>
<br>
<a href="{{route('courses.edit', $course->id)}}">Edit Course</a>
<br>

 <form action="{{route('courses.destroy', $course->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>



<h2>Course: {{$course->id}} {{$course->name}}</h2>

@endsection

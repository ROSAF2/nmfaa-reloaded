@extends('layouts.app')
@section('title', 'Edit Course')
@section('content')

<a href="{{route('courses.show',$course->id)}}">Back</a>
<br>
<form action="{{route('courses.update', $course->id)}}" method='POST'>
    @csrf
    @method('PATCH')
    <p>Enter course id</p>
    <label><input type='text' name='id' value="{{$course->id}}"></label><br>

    <p>Enter name of the course</p>
    <label><input type='text' name='name' value="{{$course->name}}"></label><br>

    <input type='submit' name='submit' value='Submit'>        
</form>

@endsection
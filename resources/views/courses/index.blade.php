@extends('layouts.app')
@section('title', 'Index Course')
@section('content')


<a href="{{route('courses.create')}}">Create Course</a>

<h2>These are the courses:</h2>

<ul>
    @foreach ($courses as $course)
        <li><a href="{{route('courses.show',$course->id)}}">{{$course}}</a></li>
    @endforeach
</ul>
@endsection

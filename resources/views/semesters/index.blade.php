@extends('layouts.app')
@section('title', 'Index Semester')
@section('content')

<a href="/">Back</a>
<br>
<a href="{{route('semesters.create')}}">Create semester</a>

<h2>These are the semesters:</h2>

<ul>
    @foreach ($semesters as $semester)
        <li><a href="{{route('semesters.show',$semester->id)}}">{{$semester}}</a></li>
    @endforeach
</ul>
@endsection

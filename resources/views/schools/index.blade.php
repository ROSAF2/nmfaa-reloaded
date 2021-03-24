@extends('layouts.app')
@section('title', 'Index School')
@section('content')

<a href="/">Back</a>
<br>
<a href="{{route('schools.create')}}">Create School</a>

<h2>These are the schools:</h2>

<ul>
    @foreach ($schools as $school)
        <li><a href="{{route('schools.show',$school->id)}}">{{$school}}</a></li>
    @endforeach
</ul>
@endsection

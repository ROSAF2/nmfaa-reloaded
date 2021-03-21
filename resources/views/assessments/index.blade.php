@extends('layouts.app')
@section('title', 'Index Assessment')
@section('content')


<a href="{{route('assessments.create')}}">Create assessment</a>

<h2>These are the assessment:</h2>

<ul>
    @foreach ($assessments as $assessment)
        <li><a href="{{route('assessments.show',$assessment->id)}}">{{$assessment}}</a></li>
    @endforeach
</ul>
@endsection

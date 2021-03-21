@extends('layouts.app')
@section('title', 'Show Assessment')
@section('content')

<a href="{{route('assessments.index')}}">Back</a>
<br>
<a href="{{route('assessments.edit', $assessment->id)}}">Edit Assessment</a>
<br>

 <form action="{{route('assessments.destroy', $assessment->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>



<h2>Assessment: {{$assessment->id}} {{$assessment->name}} {{$assessment->date}} {{$assessment->course_id}}</h2>

@endsection

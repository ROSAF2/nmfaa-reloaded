@extends('layouts.app')
@section('title', 'Show Semester')
@section('content')

<a href="{{route('semesters.index')}}">Back</a>
<br>
<a href="{{route('semesters.edit', $semester->id)}}">Edit Semester</a>
<br>

 <form action="{{route('semesters.destroy', $semester->id)}}" method="POST">       
    @csrf
    @method('DELETE')
    <input type="submit" name="delete" value="Delete" onclick=" return confirm('Are you sure you want to delete?')">
</form>



<h2>Semester: {{$semester->name}} : {{$semester->start_date}} : {{$semester->weeks_first_term}}</h2>

@endsection
@extends('layouts.app')
@section('title', 'Index Public Holiday')
@section('content')

<a href="/">Back</a>
<br>
<a href="{{route('publicHolidays.create')}}">Create Public Holiday</a>

<h2>These are the Public Holidays:</h2>

<ul>
    @foreach ($publicHolidays as $publicHoliday)
        <li><a href="{{route('publicHolidays.show',$publicHoliday->id)}}">{{$publicHoliday->date}} {{$publicHoliday->name}} {{$publicHoliday->location_affected}}</a></li>
    @endforeach
</ul>
@endsection

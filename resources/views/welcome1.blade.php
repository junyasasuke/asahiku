@extends('layout')

@section('title')
   HOME
@endsection


@section('content')
   @foreach($tasks as $task)
      <li>{{$task}}</li>
   @endforeach
@endsection

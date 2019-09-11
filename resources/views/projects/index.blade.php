@extends('layout')

@section('title')
    Projects
@endsection

@section('content')

<br>
<br>
<div class="">


 <h2>旭区民の活動たち</h2>
 </div>
   @foreach($projects as $project)
   <div class="">


   <div class="">
     <a href="/projects/{{$project->id}}" class="projects"> <li>{{$project->title}}___ {{$project->username}}</li></a>
   </div>
   <div class="pagelinks">
     {{$projects->links()}}
   </div>
   </div>

   @endforeach
@endsection

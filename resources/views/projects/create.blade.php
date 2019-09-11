@extends('layout')

@section('title')
    Create Projects
@endsection

@section('content')
<div><a href="/projects">Projects</a></div>


<form class="" action="/projects" method="post">
 @csrf
 <div class="field">
   <label class="label" for="title" >活動名</label>

   <div class="control">
      <input type="text" name="title" class="input"　required>
      <input type="hidden" name="username" value="{{$user->name}}">
   </div>
 </div>


 <div class="field">
   <label class="label" for="description" >活動概要</label>
   <div class="control">
     <textarea name="description" class="textarea"></textarea>
   </div>
 </div>


 <div class="field">
   <div class="control">
     <button type="submit" class="button is-link">作成</button>
   </div>
 </div>
@if($errors->any())
 <div class="notification is-danger">
   <ul>
     @foreach($errors->all() as $error)
      <li>{{$error}}</li>
     @endforeach
   </ul>
 </div>
@endif
</form>
@endsection

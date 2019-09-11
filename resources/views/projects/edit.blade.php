
@extends('layout')

@section('content')



<div class="">
  <div class="">



  <h1>編集</h1>

  <form action="/projects/{{$project->id}}" method="post" class="box">
    {{method_field('PATCH')}}
    @csrf
    <div class="box">
    <div class="field">
      <label class="label" for="title">活動名</label>
      </div>
      <div class="control">
        <input type="text" class="input" name="title" placeholder="Title" value="{{$project->title}}">
      </div>
    </div>

    <div class="box">

    <div class="field">
      <label for="description" class="label">活動概要</label>

            <div class="control">
              <textarea name="description" class="textarea">{{$project->description}}</textarea>
            </div>
            <br>
            @if(isset($message))
             <div class="notification is-danger">
               <ul>

                  <li>{{$message}}</li>

               </ul>
             </div>
             @endif
    </div>

        </div>

    <div class="field">
      <div class="control">
        <button type="submit">更新</button>
      </div>
    </div>

  </form>

  <form action="/projects/{{$project->id}}" method="post">
    {{method_field('DELETE')}}
    @csrf
    <div class="field">
      <div class="control">
        <button type="submit" name="button" onClick="return confirm('{{$project->title}}を削除します。\nよろしいですか？');">活動を削除</button>
        <input type="hidden" name="id" value="{{$project->id}}">
      </div>

    </div>
  </form>

</div>
</div>

@endsection

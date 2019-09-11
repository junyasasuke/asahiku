@extends('layout')

@section('content')
    <div class="">
      <div class="">
        <h6>活動名</h6>
      </div>

          <h1 class='each-title'>{{$project->title}}</h1>
          <div class="">
            <h6>活動概要</h6>
          </div>
          <div class="content box">
            {{$project->description}}
          </div>
          <div class="">
          <p>
              <a href="/projects/{{$project->id}}/edit">↑編集</a>
          </p>
          </div>
     </div>

<div class="">


      <div class="box">

                <form  action="/tasks" method="post" class="box">
                  @csrf
                  <div class="field">
                    <label class="label" for='body'>活動内容（todo）</label>
                        <div class="control">
                            <input type="text" class="input" name="body" placefolder="New Task">
                        </div>
                  </div>

                  <input type="hidden" name="project_id" value="{{$project->id}}">

                  <div class="field">
                    <div class="control">
                      <button type="submit" name="button is-link">詳細追加</button>
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
      @if($project->tasks->count())
        @foreach($project->tasks as $task)
        <div>
        <form  action="/tasks/{{$task->id}}" method="post">
          @method('PATCH')
          @csrf
          <label class="checkbox {{$task->completed ? 'is-complete': ''}}" for='completed'>
            <input type="checkbox" name="completed" onchange="this.form.submit()"
                {{$task->completed ? 'checked': ''}}>
             <input type="text" name="" value="{{$task->body}}">これ編集と削除できるようにする <button type="submit" name="button">変更</button>
          </label>
        </form>
      </div>
        @endforeach

      </div>
      @endif
</div>


@endsection

@extends('layouts.app')

@section('head')
  <META http-equiv="Refresh" content="3;URL=http://127.0.0.1:8000/projects">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                    <br>
                    <br>
                    ３秒後に移動します
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

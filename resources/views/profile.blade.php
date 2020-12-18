@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-6">
            <h3>Questions</h3>
            @foreach ($user->questions as $question)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $question->title }}</h4>
                        <hr>
                        <p>{{ $question->description }}</p>
                    </div>
                </div>
                @endforeach
        </div>
        <div class="col-md-6">
            <h3>Answers</h3>
            @foreach ($user->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $answer->content }}</h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
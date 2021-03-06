@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <h3>Questions</h3>
            @foreach ($user->questions as $question)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>{{ $question->title }}</h4>
                        <p>{{ $question->description }}</p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-primary btn-sm" href="{{ route('questions.show', $question->id) }}">View</a>
                    </div>
                </div>
                <hr>
                @endforeach
        </div>
        <div class="col-md-6">
            <h3>Answers</h3>
            @foreach ($user->answers as $answer)

                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('questions.show', $answer->question->id) }}">{{ $answer->question->title }}</a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $answer->content }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    </div>

@endsection
@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>
    <p>Submitted by : {{  $question->user->name  }} created : {{ $question->created_at->diffForHumans() }} </p>
    <!-- Below is inserting a variable in a named route. See : https://laravel.com/docs/8.x/urls -->
    <a href="{{ route('questions.edit', ['question' => $question->id]) }}" type="submit" class="btn btn-primary">Edit</a>
    <hr>

    <div class="col-md-8">
        <h4>Answers :</h4>
        @if($question->answers->count() > 0)
            @foreach($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            {{ $answer->content }}
                        </p>
                        <p>Answered by: {{ $answer->user->name }}</p>
                    </div>
                </div>
            @endforeach

        @else
        <div class="panel panel-default">
                <div class="panel-body">
                    <p>
                        <b>There are not answers yet :( </b>
                    </p>
                </div>
            </div>
        @endif    
    </div>

    <hr>

    <div class="col-md-8">
    <form action="{{ route('answers.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="content">Description: </label>
            <textarea class="form-control" name="content" id="content" rows="10" ></textarea>
            <input type="hidden" value="{{ $question->id }}" name="question_id">
            <br>
            <button  type="submit" class="btn btn-primary btn-md">Submit Answer</button>
        </div>
    </form>
    </div>
</div>
@endsection
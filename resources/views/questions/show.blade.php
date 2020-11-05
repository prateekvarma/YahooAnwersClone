@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>

    <hr>

    <div class="col-md-8">
        @if($question->answers->count() > 0)
            @foreach($question->answers as $answer)
                <div class="panel panel-default">
                    <div class="panel-body">
                        <p>
                            {{ $answer->content }}
                        </p>
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
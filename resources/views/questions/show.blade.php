@extends('layouts.app')

@section('content')

<div class="container">
    <h1>{{ $question->title }}</h1>
    <p class="lead">{{ $question->description }}</p>


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
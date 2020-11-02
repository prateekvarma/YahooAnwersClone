@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Recent Questions: </h1>
    <hr>
    @foreach ($questions as $question)
        <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $question->title }}</h3>
            <p class="card-text">{{ $question->description }}</p>
            <a href="{{ route('questions.show', $question->id) }}" class="btn btn-primary btn-sm">View</a>
        </div>
        </div>
        <br>
    @endforeach
</div>
@endsection
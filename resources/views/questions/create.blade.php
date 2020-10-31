@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('questions.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="title">Question: </label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>    

                <div class="form-group">    
                    <label for="description">Description: </label>
                    <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                </div>    
                <hr>
                <input type="button" value="Submit Question" class="btn btn-primary">
            </form>
        </div>    
    </div>        
</div>

@endsection
@extends('layouts.app')
  
@section('title', 'Review Update')
  
@section('contents')
    <h4 class="mb-0">Edit</h4>
    <hr />
    <form action="{{ route('reviews.update', $reviews->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
            <label class="form-label">Title</label>
                <select name="title" class="form-control">
                    @foreach($comics as $comic)
                        <option value="{{ $comic->title }}">{{ $comic->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">Rating</label>
                <input type="number" name="rating" class="form-control" placeholder="Rating" value="{{ $reviews->rating }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Feedback</label>
                <input type="text" name="feedback" class="form-control" placeholder="Feedback" value="{{ $reviews->feedback }}" >
            </div>
            <div class="col mb-3">
            <label class="form-label">Rater Name</label>
                <select name="rater_name" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
     
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <a href="http://127.0.0.1:8000/reviews" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
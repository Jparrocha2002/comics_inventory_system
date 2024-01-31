@extends('layouts.app')
  
@section('title', 'Users Details')
  
@section('contents')
    <h4 class="mb-0">Info</h4>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $reviews->title }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Rating</label>
            <input type="number" name="rating" class="form-control" placeholder="Rating" value="{{ $reviews->rating }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Feedback</label>
            <input type="text" name="feedback" class="form-control" placeholder="Feedback" value="{{ $reviews->feedback }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Rater Name</label>
            <input type="text" name="rater_name" class="form-control" placeholder="Rater Name" value="{{ $reviews->rater_name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $reviews->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $reviews->updated_at }}" readonly>
        </div>
    </div>
    <a href="http://127.0.0.1:8000/reviews" type="button" class="btn btn-danger m-0">Back</a>
@endsection
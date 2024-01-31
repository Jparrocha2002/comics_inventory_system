@extends('layouts.app')
  
@section('title', 'Creating New User')
  
@section('contents')
    <h4 class="mb-0">New User</h4>
    <hr />
    <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Title</label>
                <select name="title" class="form-control">
                <option value="" selected disabled>------Select------</option>
                    @foreach($comics as $comic)
                        <option value="{{ $comic->title }}">{{ $comic->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
            <label class="form-label">Rating</label>
                <input type="number" name="rating" class="form-control" placeholder="Rating">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Feedback</label>
                <input type="text" name="feedback" class="form-control" placeholder="Feedback">
            </div>
            <div class="col">
            <label class="form-label">Rater Name</label>
                <select name="rater_name" class="form-control">
                <option value="" selected disabled>------Select------</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="http://127.0.0.1:8000/reviews" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
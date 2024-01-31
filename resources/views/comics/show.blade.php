@extends('layouts.app')
  
@section('title', 'Comics Details')
  
@section('contents')
    <h4 class="mb-0">Info</h4>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">ISBN</label>
            <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="{{ $comics->isbn }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $comics->title }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Author</label>
            <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $comics->author }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Category</label>
            <input type="text" name="category" class="form-control" placeholder="Category" value="{{ $comics->category }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Published</label>
            <input type="text" name="published" class="form-control" placeholder="Published" value="{{ $comics->published }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Available</label>
            <input type="text" name="available" class="form-control" placeholder="Available" value="{{ $comics->available }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ $comics->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $comics->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $comics->updated_at }}" readonly>
        </div>
    </div>
    <a href="http://127.0.0.1:8000/comics" type="button" class="btn btn-danger m-0">Back</a>
@endsection
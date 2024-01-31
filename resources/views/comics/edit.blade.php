@extends('layouts.app')
  
@section('title', 'Comics Update')
  
@section('contents')
    <h4 class="mb-0">Edit</h4>
    <hr />
    <form action="{{ route('comics.update', $comics->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" placeholder="ISBN" value="{{ $comics->isbn }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $comics->title }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author" value="{{ $comics->author }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Category Name</label>
                    <select name="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Published</label>
                <input type="date" name="published" class="form-control" placeholder="Published" value="{{ $comics->published_year }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Available</label>
                <input type="text" name="available" class="form-control" placeholder="Available" value="{{ $comics->available }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Status</label>
            <select type="text" name="status" class="form-control" placeholder="Status">
            <option value="" selected disabled>Status</option>
                <option value="Available">Available</option>
                <option value="Unavailable">Unavailable</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <a href="http://127.0.0.1:8000/comics" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
@extends('layouts.app')
  
@section('title', 'Creating New Comics')
  
@section('contents')
    <h4 class="mb-0">New Comics</h4>
    <hr />
    <form action="{{ route('comics.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">ISBN</label>
                <input type="text" name="isbn" class="form-control" placeholder="ISBN">
            </div>
            <div class="col">
            <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Author</label>
                <input type="text" name="author" class="form-control" placeholder="Author">
            </div>
            <div class="col">
                <label class="form-label">Category Name</label>
                <select name="category" class="form-control">
                <option value="" selected disabled>------Select Category------</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Published</label>
                <input type="date" name="published" class="form-control" placeholder="Published">
            </div>
            <div class="col">
            <label class="form-label">Available</label>
                <input type="number" name="available" class="form-control" placeholder="Available">
            </div>
            <div class="col">
            <label class="form-label">Status</label>
                <select type="text" name="status" class="form-control" placeholder="Availability">
                    <option value="" selected disabled>Status</option>
                    <option value="Available">Available</option>
                    <option value="Unavailable">Unavailable</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="http://127.0.0.1:8000/comics" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
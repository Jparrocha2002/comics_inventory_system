@extends('layouts.app')
  
@section('title', 'Creating New Category')
  
@section('contents')
    <h4 class="mb-0">New Category</h4>
    <hr />
    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Category Name</label>
                <input type="text" name="category_name" class="form-control" placeholder="Category Name">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="http://127.0.0.1:8000/categories" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
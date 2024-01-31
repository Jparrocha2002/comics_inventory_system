@extends('layouts.app')
  
@section('title', 'Category Update')
  
@section('contents')
    <h4 class="mb-0">Edit</h4>
    <hr />
    <form action="{{ route('categories.update', $categories->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Category Name</label>
                <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{ $categories->category_name }}" >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <a href="http://127.0.0.1:8000/categories" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
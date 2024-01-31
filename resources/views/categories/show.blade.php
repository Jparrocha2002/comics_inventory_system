@extends('layouts.app')
  
@section('title', 'Comics Details')
  
@section('contents')
    <h4 class="mb-0">Info</h4>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Category Name</label>
            <input type="text" name="category_name" class="form-control" placeholder="Category Name" value="{{ $categories->category_name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $categories->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $categories->updated_at }}" readonly>
        </div>
    </div>
    <a href="http://127.0.0.1:8000/categories" type="button" class="btn btn-danger m-0">Back</a>
@endsection
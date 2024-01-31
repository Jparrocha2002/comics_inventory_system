@extends('layouts.app')
  
@section('title', 'Users Update')
  
@section('contents')
    <h4 class="mb-0">Edit</h4>
    <hr />
    <form action="{{ route('admin.update', $admin->id) }}"enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Choose Avatar</strong>
        <input type="file" name="avatars" class="form-control-file">    
        </div>
        </div>
            <div class="col mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $admin->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" >
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Role</label>
            <select type="text" name="role" class="form-control" id="exampleInputEmail" placeholder="Role" value="{{ $admin->role }}">
                <option value="" selected disabled>Select a Role</option>
                <option value="Reader">Reader</option> 
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Status</label>
            <select type="text" name="status" class="form-control" placeholder="Status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <a href="http://127.0.0.1:8000/admin" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
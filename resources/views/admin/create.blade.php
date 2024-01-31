@extends('layouts.app')
  
@section('title', 'Creating New User')
  
@section('contents')
    <h4 class="mb-0">New User</h4>
    <hr />
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <!-- <strong>Choose Avatar</strong> -->
            <!-- <br> -->
            <!-- <input type="file" name="avatars" class="form-control-file">     -->
                </div>
            </div>
            <div class="col">
            <label class="form-label">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Full Name">
            </div>
            <div class="col">
            <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
            <label class="form-label">Role</label>
            <select type="text" name="role" class="form-control" id="exampleInputEmail" placeholder="Role">
                <option value="" selected disabled>Select a Role</option>
                <option value="Reader">Reader</option> 
            </select>
            </div>
            <div class="col">
            <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <div class="col">
            <label class="form-label">Status</label>
            <select type="text" name="status" class="form-control" placeholder="Status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
            </div>
        </div>

        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="http://127.0.0.1:8000/admin" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
@extends('layouts.app')
  
@section('title', 'Users Details')
  
@section('contents')
    <h4 class="mb-0">Info</h4>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Full Name</label>
            <input type="text" name="name" class="form-control" placeholder="Full Name" value="{{ $admin->name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="{{ $admin->email }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Role</label>
            <input type="text" name="role" class="form-control" placeholder="Role" value="{{ $admin->role }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Status</label>
            <input type="text" name="status" class="form-control" placeholder="Status" value="{{ $admin->status }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $admin->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $admin->updated_at }}" readonly>
        </div>
    </div>
    <a href="http://127.0.0.1:8000/admin" type="button" class="btn btn-danger m-0">Back</a>
@endsection
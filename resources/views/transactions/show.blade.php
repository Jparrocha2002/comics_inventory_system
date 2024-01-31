@extends('layouts.app')
  
@section('title', 'Users Details')
  
@section('contents')
    <h4 class="mb-0">Info</h4>
    <hr />
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Comic Name</label>
            <input type="text" name="comic_name" class="form-control" placeholder="Full Name" value="{{ $transactions->comic_name }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">User Name</label>
            <input type="text" name="user_name" class="form-control" placeholder="Email" value="{{ $transactions->user_name }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Date</label>
            <input type="text" name="date" class="form-control" placeholder="Role" value="{{ $transactions->date }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Transaction Type</label>
            <input type="text" name="transaction_type" class="form-control" placeholder="Status" value="{{ $transactions->transaction_type }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Quantity</label>
            <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ $transactions->quantity }}" readonly>
        </div>
    </div>
    <div class="row">
        <div class="col mb-3">
            <label class="form-label">Created At</label>
            <input type="text" name="created_at" class="form-control" placeholder="Created At" value="{{ $transactions->created_at }}" readonly>
        </div>
        <div class="col mb-3">
            <label class="form-label">Updated At</label>
            <input type="text" name="updated_at" class="form-control" placeholder="Updated At" value="{{ $transactions->updated_at }}" readonly>
        </div>
    </div>
    <a href="http://127.0.0.1:8000/transactions" type="button" class="btn btn-danger m-0">Back</a>
@endsection
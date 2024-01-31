@extends('layouts.app')
  
@section('title', 'Users Update')
  
@section('contents')
    <h4 class="mb-0">Edit</h4>
    <hr />
    <form action="{{ route('transactions.update', $transactions->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Comic Name</label>
                <select name="comic_name" class="form-control" value="{{ $transactions->email }}" >
                    @foreach($comics as $comic)
                        <option value="{{ $comic->title }}">{{ $comic->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">Email</label>
                <select name="user_name" class="form-control" value="{{ $transactions->email }}">
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control" value="Date">
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Transaction Type</label>
            <select type="text" name="transaction_type" class="form-control" placeholder="transaction_type">
                <option value="Borrow">Borrow</option>
                <option value="Return">Return</option>
            </select>
            </div>
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control" value="Quantity">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
                <a href="http://127.0.0.1:8000/transactions" type="button" class="btn btn-danger m-0">Back</a>
            </div>
        </div>
    </form>
@endsection
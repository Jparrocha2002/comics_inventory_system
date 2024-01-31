@extends('layouts.app')
  
@section('title', 'Creating New Transaction')
  
@section('contents')
    <h4 class="mb-0">New Transaction</h4>
    <hr />
    <form action="{{ route('transactions.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
                <div class="col">
                    <label class="form-label">Comic Name</label>
                    <select name="comic_name" class="form-control">
                    <option value="" selected disabled>------Select Comics------</option>
                        @foreach($comics as $comic)
                            <option value="{{ $comic->title }}">{{ $comic->title }}</option>
                        @endforeach
                    </select>
                </div>
            <div class="col">
                <label class="form-label">User Name</label>
                <select name="user_name" class="form-control">
                <option value="" selected disabled>------Select Users------</option>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col">
                <label class="form-label">Date</label>
                <input type="date" name="date" class="form-control">
            </div>
            <div class="col">
                <label class="form-label">Transaction Type</label>
                <select name="transaction_type" class="form-control">
                    <option value="Borrow">Borrow</option>
                    <option value="Return">Return</option>
                </select>
            </div>
            <div class="col">
                <label class="form-label">Quantity</label>
                <input type="number" name="quantity" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection

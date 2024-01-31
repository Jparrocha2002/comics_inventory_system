@extends('layouts.app')
 
@section('title', 'Dashboard')
 
@section('contents')
  <div class="row">
@include('layouts.partials.cards')
@include('layouts.updates.comics')
  </div>
@endsection
@extends('layouts.app')

@section('dashboard','active')

@section('content')
<div class="card">
    <div class="card-body">
        @if(Auth::check())
        <h5 class="card-title fw-semibold mb-4">Welcome, {{ Auth::user()->name }}</h5>
        @endif
        <p class="mb-0">This is a dashboard page </p>
    </div>
</div>
@endsection
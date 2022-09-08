@extends('main')

@section('content')

<div class="card">
    <div class="card-header">Dashboard</div>
    <div class="card-body">
        You are logged in Custom Laravel Login Registartion system.
    </div>
</div>

<div>
    <div class="container" href="#">Go to Your Profile</div>
    <a class="container" href="{{ route('profile') }}">Profile </a>
</div>

@endsection('content')
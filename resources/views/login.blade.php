@extends('main')

@section('content')

@if($message = Session::get('success'))

<div class="alert alert-info">
    {{ $message }}
</div>

@endif
 <div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card-header">Login</div>
        <div class="card-body">
            <form action="{{ route('auth.validate_login') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <input type="text" name="email"  class="form-control" autocomplete="off" placeholder="Email" />
                    @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                            @if($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            @endif
                </div>
                <div class="d-grid mx-auto">
                            <button type="submit" class="btn btn-dark btn-block">Login</button>
                        </div> 
                </div>
                </div>
            </form>
        </div>
    </div>
 </div>

@endsection('content')
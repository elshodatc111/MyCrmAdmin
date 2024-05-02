@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">KIRISH</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        <input id="password" type="password" class="form-control my-2 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label mb-2" for="remember">Paromni eslab qolish</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">KIRISH</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

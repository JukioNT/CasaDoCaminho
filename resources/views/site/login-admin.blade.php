@extends('layout')
@section('body')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{__('Login')}}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login-admin-submit') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">
                                {{__('E-mailAdministrador')}}
                            </label>
                            <div class="col-md-6">
                                <input type="text" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{__('Senha')}}</label>
                            <div class="col-md-6">
                                <input type="text" id="password" type="password" class="form-control @error('passowrd') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{$message}}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
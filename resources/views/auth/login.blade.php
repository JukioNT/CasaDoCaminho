@extends('site.layout')
@section('title', 'Editar Doação')
@section('body')

<div class="login-title">
    <h1>Área administrativa</h1>
</div>
<div class="login-div">
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">  
            <label for="email" class="form-label">Email:</label>
            <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="form-control login-input"/>
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="email" class="form-label">Password:</label>
            <input id="password" class="form-control login-input" type="password" name="password" required autocomplete="current-password" />
        </div>

        <!-- Button -->
        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="btn btn-primary">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection

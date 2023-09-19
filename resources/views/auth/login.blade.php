@extends('site.layout')
@section('title', 'Editar Doação')
@section('body')
<x-auth-session-status class="mb-4" :status="session('status')" />
<form method="POST" action="{{ route('login') }}">
    @csrf
    <section class="vh-100 gradient-custom">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card bg-dark text-white" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                  <div class="mb-md-5 mt-md-4 pb-5">
                    <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                    <p class="text-white-50 mb-5">Área administrativa</p>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="email">Email</label>
                      <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"  class="form-control form-control-lg" />
                    </div>
                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="password">Password</label>
                      <input id="password" type="password" name="password" class="form-control form-control-lg" />
                    </div>
                    <x-primary-button class="btn btn-outline-light btn-lg px-5" type="submit">
                        {{ __('Log in') }}
                    </x-primary-button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</form>
@endsection

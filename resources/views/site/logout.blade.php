@extends('site.layout')
@section('title', 'Logout')
@section('body')
<div class="container logout">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
    
        <button :href="route('logout')" class="btn btn-danger"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </button>
    </form>
</div>
@endsection

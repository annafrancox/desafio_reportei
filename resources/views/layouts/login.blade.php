@extends('admin.layouts.register')
@section('content')
    <div class="login-page">
        <div id="app" class="login-box">
            <div class="login-logo">
                <img src="{{ asset('img/login.png') }}" class="img-fluid img-login">
            </div>
            <div class="card">
                <div class="card-body login-card-body">
                    @yield('information')
                </div>
            </div>
        </div>
    </div>

@endsection


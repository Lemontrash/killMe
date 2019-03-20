@extends('forms')


@section('title')
    Login
@endsection
@yield('headAssetsSection')

@section('pageUniqueStyles')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
@endsection

@section('content')

    <div id="registrationWrapper">
        <h1>Login</h1>
        <form id="login" class="formBody" method="POST" action="{{route('login')}}">
            @csrf
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Password</label>
                    <input type="password" name="password" placeholder="Password" minlength="6" maxlength="64" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner jc-space-between">
                    <input type="checkbox" class="checkbox" id="register_checkbox" />
                    <label for="register_checkbox">Keep me logged in</label>
                    <a href="{{route('password.request')}}" class="forgot">Forgot password?</a>
                </div>
            </div>
            <button name="submit" type="submit">Sign In</button>
            <a href="{{route('register')}}" class="register">Don`t have an account?</a>
        </form>
    </div>
@endsection


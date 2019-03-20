



@section('title')
    Reset Password
@endsection
@yield('headAssetsSection')

@section('content')

    <div id="registrationWrapper">
        <h1>Recover Password</h1>

        <form id="registration" class="formBody" method="POST" action="{{route('password.request')}}">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
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
                    <input type="password" name="password" placeholder="Password" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Password Confirmation</label>
                    <input type="password" name="password_confirmation" placeholder="Password Confirmation" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>

            <button name="submit" type="submit">Reset</button>

        </form>
    </div>
@endsection



@extends('forms')


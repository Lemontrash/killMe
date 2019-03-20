@extends('forms')


@section('title')
    Login
@endsection
@yield('headAssetsSection')

@section('content')

    <div id="registrationWrapper">
        <h1>Login</h1>
        <form id="registration" class="formBody" method="POST" action="{{route('forgot')}}">
            @csrf
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>

            <button name="submit" type="submit">Sign In</button>

        </form>
    </div>
@endsection


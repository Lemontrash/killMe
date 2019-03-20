


@section('title')
    Recover Password
@endsection
@yield('headAssetsSection')

@section('content')

    <div id="registrationWrapper">
        <h1>Recover Password</h1>
        <div class="panel-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

        </div>
        <form id="registration" class="formBody" method="POST" action="{{route('password.email')}}">
            @csrf
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Email</label>
                    <input type="email" name="email" placeholder="Email" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>

            <button name="submit" type="submit">Send</button>

        </form>
    </div>
@endsection



@extends('forms')


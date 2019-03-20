{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Verify Your Email Address') }}</div>--}}

                {{--<div class="card-body">--}}
                    {{--@if (session('resent'))--}}
                        {{--<div class="alert alert-success" role="alert">--}}
                            {{--{{ __('A fresh verification link has been sent to your email address.') }}--}}
                        {{--</div>--}}
                    {{--@endif--}}

                    {{--{{ __('Before proceeding, please check your email for a verification link.') }}--}}
                    {{--{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}




{{--=============================--}}


@extends('forms')


@section('title')
    Verify Your Email Address
@endsection
@yield('headAssetsSection')

@section('content')
    <div id="registrationWrapper">
        <h1>Verify Your Email Address</h1>
            <div class="inputRow">
                <div class="formInner">
                    <a style="text-decoration: none; color: grey" href="{{ route('verification.resend') }}"> Resend verification link</a>
                </div>
            </div>
    </div>
@endsection


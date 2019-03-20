@extends('forms')


@section('title')
    Upload Files
@endsection
@yield('headAssetsSection')
<link href="{{ asset('css/common.css') }}" rel="stylesheet">
<link href="{{ asset('css/upload-files.css') }}" rel="stylesheet">

@section('content')
    <div id="app">
        <div id="formPageWrapper">
            <h1>verification files</h1>
            <verification-files-form></verification-files-form>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection
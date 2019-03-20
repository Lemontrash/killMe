@extends('forms')


@section('title')
      Verification Files
@endsection
@yield('headAssetsSection')

@section('content')

    <div id="registrationWrapper">
        <h1>Verification <strong>Files</strong></h1>
        <form enctype="multipart/form-data" id="registration" class="formBody" method="POST" action="{{route('files')}}">
            @csrf
            <div class="inputRow">
                <div class="formInner">
                    <label for="">ID</label>
                    <input type="file" name="id" placeholder="File" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Selfie</label>
                    <input type="file" name="selfie" placeholder="File" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner">
                    <label for="">Bank Transfer</label>
                    <input type="file" name="bank" placeholder="File" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <div class="inputRow">
                <div class="formInner">
                    <label for="">DOD</label>
                    <input type="file" name="dod" placeholder="File" required>
                    <i class="fas fa-check-circle"></i>
                </div>
            </div>
            <button name="submit" type="submit">Continue</button>

        </form>

    </div>
    All rights reserved to <b>      Coelix studio 2019</b>
@endsection


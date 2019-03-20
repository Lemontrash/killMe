@extends('layouts.app')

@section('content')
    <form method="post" action="{{route('pdf-createView')}}" class="login">
        @csrf

        <p>
            <label for="second-name">middle-name:</label>
            <input type="text" name="middle-name" id="middle-name">
        </p>

        <p>
            <label for="country-of-residence">Country of residence:</label>
            <input type="text" name="country-of-residence" id="country-of-residence">
        </p>

        <p>
            <label for="Citizenship">Citizenship:</label>
            <input type="text" name="Citizenship" id="Citizenship">
        </p>

        <p>
            <label for="Place-of-birth">Place of birth:</label>
            <input type="text" name="place-of-birth" id="place-of-birth">
        </p>
        <p>
            <label for="Place-of-birth">Land-line:</label>
            <input type="text" name="Land-line" id="Land-line">
        </p>
        <p>
            <label for="Place-of-birth">Date-of-birth:</label>
            <input type="text" name="Date-of-birth" id="Date-of-birth">
        </p>
        <p>
            <label for="Place-of-birth">address:</label>
            <input type="text" name="address" id="address">
        </p>
        <p>
            <label for="Place-of-birth">city:</label>
            <input type="text" name="city" id="city">
        </p>
        <p>
            <label for="Place-of-birth">ZIP:</label>
            <input type="text" name="ZIP" id="ZIP">
        </p>
        <p>
            <label for="Place-of-birth">employment :</label>
            <input type="text" name="employment" id="employment ">
        </p>
        <p>
            <label for="Place-of-birth">Industry:</label>
            <input type="text" name="Industry" id="Industry">
        </p>
        <p>
            <label for="Place-of-birth">Annual income:</label>
            <input type="text" name="Annual-income" id="Annual-income">
        </p>
        <p>
            <label for="Place-of-birth">savings :</label>
            <input type="text" name="savings" id="savings ">
        </p>
        <p>
            <label for="Place-of-birth">Place of birth:</label>
            <input type="text" name="place-of-birth" id="place-of-birth">
        </p>
        <p>
            <label for="Place-of-birth">source-of-funds:</label>
            <input type="text" name="source-of-funds" id="source-of-funds">
        </p>
        <p>
            <label for="Place-of-birth">invest annually:</label>
            <input type="text" name="invest annually" id="invest annually">
        </p>
        <p>
            <label for="Place-of-birth">Name of Bank:</label>
            <input type="text" name="Name-of-Bank" id="Name-of-Bank">
        </p>
        <p>
            <label for="Place-of-birth">TAX:</label>
            <input type="text" name="TAX" id="TAX">
        </p>
        <p>
            <label for="Place-of-birth">TAX country:</label>
            <input type="text" name="TAX-country" id="TAX-country">
        </p>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('PDF SUKA') }}
                </button>
            </div>
        </div>


    </form>
@endsection

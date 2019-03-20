<html>
<head>
    <title>Profile</title>
    @include('headAssets')
    <link href="{{ asset('css/common.css') }}" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/deposit.css') }}" rel="stylesheet">

</head>

<body>

@include('profileParts/sidebar')

<div class="profile-content">
    <div class="page-title">Deposit</div>
    <hr>
    <div class="tabs-container">

        <p>
            <span class="text-gray">Beneficiary name:</span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">Beneficiary Address: </span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">Currency: </span><br>
            EUR
        </p>
        <hr>
        <p>
            <span class="text-gray">Bank name: </span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">Bank address:</span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">IBAN:</span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">Swift:</span><br>
            <b>Wait</b>
        </p>
        <hr>
        <p>
            <span class="text-gray">Reference:</span><br>
            <b>Wait</b>
        </p>
        <form class="profile-exchange-form profile-form" method="post" action="{{route('newExchange')}}">
            @csrf

            <div class="theme-row">
                <div class="inp-wrap amount-inp">
                    <input type="number" step="0.01" placeholder="Amount to purchase" name="amount">
                </div>
            </div>
            <div class="theme-row">
                <button class="theme-btn btn-blue ttu" type="submit" disabled="">Continue</button>
            </div>

        </form>
    </div>
</div>

@include('scriptAssets')
</body>
</html>
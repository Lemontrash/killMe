<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>PDF</title>
</head>
<body>
	
	<div class="header">GURUCHANGE LTD</div>
	<div class="post-header">Wire Deposit Form</div>

	<div class="blue-row">Customer Information</div>
	<div class="gray-row">Full Name: <span class="value">{{$firstName. ' ' . $lastName}}</span></div>
	<div class="gray-row">Payment Details: <span class="value">To FXGlobe</span></div>
	<div class="gray-row">Amount: <span class="value">{{$amount}}</span></div>
	<div class="gray-row">Currency: <span class="value">EUR</span></div>

	<div class="blue-row">Electronic Wire Transfer Instructions</div>
	<div class="gray-row">Beneficiary name: <span class="value">{{$beneficiaryName}}</span></div>
	<div class="gray-row">Beneficiary Address: <span class="value">{{$beneficiaryAddress}}</span></div>
	<div class="gray-row">Bank name: <span class="value">{{$bankName}}</span></div>
	<div class="gray-row">Bank address: <span class="value">{{$bankLocation}}</span></div>
	<div class="gray-row">IBAN: <span class="value">{{$iban}}</span></div>
	<div class="gray-row">Swift: <span class="value">{{$swift}}</span></div>
	<div class="gray-row">Currency: <span class="value">EUR</span></div>

	<div class="footer">All rights reserved to Guruchange 2019 ©</div>
	<style>
	@font-face {
		font-family: "Rubik Regular";
		src: url("Rubik-Regular.ttf");
	}
	@font-face {
		font-family: "Rubik Bold";
		src: url("Rubik-Bold.ttf");
	}
	@page {
	    margin: 0;
	    size: a4 landscape;
	}
		html,
		body{
			width: 100%;
			margin: 0;
			padding: 0;
			font-family: "Rubik Regular";
		}
		body{
			position: relative;
		}
		.header{
			background-size: cover;
			background-image: linear-gradient(318deg, #202a40 0%, #0a1425);
			text-align: center;
			padding-top: 59pt;
			padding-bottom: 19pt;
			font-family: "Rubik Bold";
			font-size: 22pt;
			color: #fff;
		}
		.post-header{
			padding: 12pt 0;
			color: #121c2e;
			font-family: "Rubik Bold";
			font-size: 20pt;
			padding-right: 48pt;
			padding-left: 48pt;
		}
		.blue-row{
			padding: 12pt 48pt;
			font-size: 12.7pt;
			color: #fff;
			font-family: "Rubik Bold";
			background-color: #343c53;
		}
		.gray-row{
			padding: 9.5pt 48pt;
			background: #EBEBEC;
			color: #8b8b8b;
			font-size: 10.7pt;
		}
		.gray-row:nth-child(2n+1){
			background-color: #E1E2E5;
		}
		.gray-row .value{
			font-family: "Rubik Bold";
			color: #121c2e;
		}
		.footer{
			font-family: "Rubik Bold";
			font-size: 10pt;
			color: #262c3e;
			position: absolute;
			bottom: 19pt;
			text-align: center;
			width: 100%;
		}
	</style>
</body>
</html>
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
	<div class="gray-row">Full Name: <span class="value">{{}}</span></div>
	<div class="gray-row">Payment Details: <span class="value">To FXGlobe</span></div>
	<div class="gray-row">Amount: <span class="value">59</span></div>
	<div class="gray-row">Currency: <span class="value">EUR</span></div>

	<div class="blue-row">Electronic Wire Transfer Instructions</div>
	<div class="gray-row">Beneficiary name: <span class="value">FXGLOBE LTD</span></div>
	<div class="gray-row">Beneficiary Address: <span class="value">7 Omirou Street, 2nd Floor Limassol 3095, Cyprus</span></div>
	<div class="gray-row">Bank name: <span class="value">Powszechna Kasa Oszczednosci Bank Polski Sa</span></div>
	<div class="gray-row">Bank address: <span class="value">Nowogrodzka 35/41, 00-950 , Warszawa, Poland</span></div>
	<div class="gray-row">IBAN: <span class="value">PL97 1020 1026 0000 1402 0275 9900</span></div>
	<div class="gray-row">Swift: <span class="value">BPKOPLPW</span></div>
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
			padding-top: 250px;
			padding-bottom: 80px;
			font-family: "Rubik Bold";
			font-size: 92px;
			color: #fff;
		}
		.post-header{
			padding: 50px 0;
			color: #121c2e;
			font-family: "Rubik Bold";
			font-size: 83px;
			padding-right: 200px;
			padding-left: 200px;
		}
		.blue-row{
			padding: 50px 200px;
			font-size: 53px;
			color: #fff;
			font-family: "Rubik Bold";
			background-color: #343c53;
		}
		.gray-row{
			padding: 40px 200px;
			background: #EBEBEC;
			color: #8b8b8b;
			font-size: 45px;
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
			font-size: 42px;
			color: #262c3e;
			position: absolute;
			bottom: 80px;
			text-align: center;
			width: 100%;
		}
	</style>
</body>
</html>

<html>
	<head>
		<title>Verification Page</title>
        <link rel="stylesheet" type="text/css" href="valid_style.css">  
	</head>

	<body style="margin: 0px;">

    <div style="line-height: 100px; font-size: 40px; margin-top: 0px; padding-left: 400px; background-color: #3d91ce">
        <h1>Verification of the Email</h1>
	</div>
	
	<center>	

	<form action="chk_otp.php" method="post">

        <label id="focus" style="font-size: 25px;">Verifying user email : </label>
		<br>
		<label id="focus" name="email" ><?php session_start(); echo $_SESSION['snd_email']; ?></label>
		<br><br>

		<label style="font-size: 25px;">OTP:</label>
		<br>
		<input id="focus" type="number" id="otp" name="otp">
		<br><br>

		<button type="submit" id="verify" name="submit">Verify</button>
		<br><br>

	</form>

    </center>


	</body>
</html>
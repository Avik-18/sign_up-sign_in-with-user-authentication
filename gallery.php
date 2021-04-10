
<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="signup_style.css">  
        <link rel="stylesheet" type="text/css" href="gallery_style.css">  
	</head>

	<body>

		<div id="signup_header" style="line-height: 60px; font-size: 40px; margin-top: 0px; padding-left: 30px; background-color:rgb(19, 197, 13);">
			Av's Bakery

			<img src="user.png" style="width: 50px; height: 30px; float: right; margin-top: 5px; margin-right: 20px;">

            <span style=" float:right; margin-right: 10px; font-size: 15px;  ">

			<?php

				session_start();

				$mail= $_SESSION['snd_email'];

				$servername = "localhost";
				$username = "root";
				$dbpassword = "";
				$dbname = "project";

				// Create connection
				$conn = new mysqli($servername, $username, $dbpassword, $dbname);
				// Check connection
				if ($conn->connect_error)
				{
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT fullname FROM user where email='$mail'";
				$result = $conn->query($sql);

				while($row = $result->fetch_assoc())
				{
				echo $row["fullname"];
				}
				$conn->close();

			?>

			</span>
		</div>

			<ul>
                <li><a href="gallery.php">Gallery</a></li>

				<li class="dropdown">
                    <a href="javascript:void(0)" class="dropbtn">Account</a>
                    <div class="dropdown-content">
                      <a href="#">Setting</a>
                      <a href="login.php">Sign Out</a>
                    </div>	

				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
			  </ul>


		<div class="image">
			<img src="./image/1.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/2.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/3.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/4.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/5.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/6.jpeg" id="pic">			
		</div>

		<div class="image">
			<img src="./image/7.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/8.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/9.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/10.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/11.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/12.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/13.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/14.jpeg" id="pic">
		</div>

		<div class="image">
			<img src="./image/15.jpeg" id="pic">
		</div>


		<div class="footer">
			<p>Footer</p>
		</div>


	</body>
</html>
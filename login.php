<?php

	if(isset($_POST['submit']))
	{
		session_start();

		

		$servername = "localhost";
		$username = "root";
		$dbpassword = "";
		$dbname = "project";

		$to= $_POST['Email'];
		$password= $_POST['pwd'];

		$_SESSION['snd_email']=$to;

		// Create connection
		$conn = new mysqli($servername, $username, $dbpassword, $dbname);
		// Check connection
		if ($conn->connect_error)
		{
			die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT email, pwd FROM user";
		$result = $conn->query($sql);


		if ($result->num_rows > 0)
		{
		// output data of each row
		while($row = $result->fetch_assoc())
		{      
			if(strcmp($to,$row["email"])==0 && strcmp($password,$row["pwd"])==0 )
			{   
				$conn->close();
				header("Location: gallery.php");
			}
			else
			{
				echo "<script type='text/javascript'>alert('Username or Password in not correct')</script>";

			}
		}
		} 
		else 
		{
			echo "<script type='text/javascript'>alert('Username or Password in not correct')</script>";
		}



		$conn->close();
	}



?>





<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" type="text/css" href="signup_style.css">  
	</head>

	<body>

		<div id="signup_header" style="line-height: 60px; font-size: 40px; margin-top: 0px; padding-left: 30px; background-color:rgb(19, 197, 13);">
			Av's Bakery
		</div>

			<ul>
				<li><a class="active" href="login.php">Home</a></li>
				<li><a href="#contact">Contact</a></li>
				<li><a href="#about">About</a></li>
			  </ul>

		<div id="signup" style="width: 370px; height: 600px; margin-top: 65px; margin-left: 1200px; padding-top: 10px; padding-left: 16px; border:1px solid #ccc">
	
			<h1 style="font-size: 30px;">Login</h1>


			<form action="login.php" method="post">


				<label>Email:</label>
				
				<input type="text" id="" name="Email" required >
				<br><br>

				<label>Password:</label>
				
				<input type="password" id="pwd" name="pwd" required>
				<br><br>

				

				<label>
					<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
				  </label>
				  
			  
				  <div class="clearfix">
					<button type="button" class="cancelbtn">Cancel</button>
					<button type="submit" class="signupbtn" id="sub" name="submit">Login</button>
				  </div>

			</form>

            <p>If you do not have an account, then to register click on the sing up button given below:</p>
            <a href="signup.php"><button type="button" class="signbtn">Sign Up</button></a>

		</div>

		<div class="footer">
			<p>Footer</p>
		  </div>


	</body>
</html>
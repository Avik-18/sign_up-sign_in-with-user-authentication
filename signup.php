<?php

    if(isset($_POST['submit']))
    {
        session_start();

        $name= $_POST['name'];
        $to= $_POST['Email'];
        $password= $_POST['pwd'];

        $f1=0;
        if (!filter_var($to, FILTER_VALIDATE_EMAIL)) {
            $f1=1;
            echo "<script> alert('Email is invalid') </script>";

          
          }

        $otp= rand(100000,1000000);

        $_SESSION['snd_name']=$name;
        $_SESSION['snd_email']=$to; 
        $_SESSION['snd_pwd']=$password; 
        $_SESSION['snd_otp']=$otp;


        $subject = "Email Verification";
        $txt = "You Otp for email verification is ". strval($otp);
        $headers = "From: your-mail-id@gmail.com";

        

        $servername = "localhost";
        $username = "root";
        $dbpassword = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);
        // Check connection
        if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT email FROM user";
        $result = $conn->query($sql);


        if ($result->num_rows > 0 && $f1==0)
        {
          $f2=0;
        // output data of each row
          while($row = $result->fetch_assoc())
          {      
              if(strcmp($to,$row["email"])==0)
              {  
                  $f2=1; 
                  echo "<script> alert('User already exists') </script>";
                  break;
               
              }
          }
          if($f2==0)
          {
            $conn->close(); 
            mail($to,$subject,$txt,$headers);
            header("Location: validation.php"); 
          }
        } 
        $conn->close(); 
        if($f1==0 && $f2==0)
          {
            mail($to,$subject,$txt,$headers);
            header("Location: validation.php"); 
          }


           
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
	
			<h1 style="font-size: 30px;">Sign up</h1>

			<p>Fill the form to create your account</p>

			<form action="signup.php" method="post">

				<label style="margin-top: 50px;">Name:</label>
				
				<input type="text" id="name" name="name" required >
				<br><br>


				<label>Email:</label>
				
				<input type="text" id="" name="Email" required >
				<br><br>

                <span id="text"></span>

				<label>Password:</label>
				
				<input type="password" id="pwd" name="pwd" required>
				<br><br>

				

				<label>
					<input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
				  </label>
				  
				  <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>
			  
				  <div class="clearfix">
					<button type="button" class="cancelbtn">Cancel</button>
					<button type="submit" class="signupbtn" id="sub" name="submit" value="Sign Up">Sign Up</button>
				  </div>

			</form>


		</div>

		<div class="footer">
			<p>Footer</p>
		  </div>


	</body>
</html>
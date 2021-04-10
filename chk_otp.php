<?php
    if(isset($_POST['submit']))
    {

        session_start();

        $otp= $_POST['otp'];
        $name= $_SESSION['snd_name'];
        $mail= $_SESSION['snd_email'];
        $pwd= $_SESSION['snd_pwd'];


        if($_SESSION['snd_otp']==$otp)
        {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "project";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
            }


            $sql = "INSERT INTO user (fullname, email, pwd)
            VALUES ('$name','$mail','$pwd')";

            if ($conn->query($sql) === FALSE) 
            {
                echo "Database error! Try again later";
                $conn->close();
                exit; 
            }
    

            $conn->close();

            header("Location: login.php");
        }
        else
        {
            echo 'Otp no match';
        }

        
        

    }

?>
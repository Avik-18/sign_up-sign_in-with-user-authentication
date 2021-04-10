<?php

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

    $sql = "SELECT fullname, email, pwdFROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc())
    {       
        echo "Name: " . $row["fullname"]. " - Email: " . $row["email"]. " - pwd: " . $row["pwd"]. "<br>";

    }
    } 
    else 
    {
    echo "0 results";
    }

    /*

    $sql = "DELETE FROM user";

    if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
    } else {
    echo "Error deleting record: " . $conn->error;
    }
*/

    $conn->close();



?>
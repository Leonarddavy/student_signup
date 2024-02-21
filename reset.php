<?php

session_start();

$randomstring = $_GET['rs'];

 require 'connection.php';

$sql = "SELECT * FROM reseting WHERE password_link = '$randomstring'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {

        $_SESSION["getemail"] = $row['email'];
        echo "reset page";
        header("Location: http://localhost/loginsystem/reset.html");
    }
} else {

    echo "0 results";
}

mysqli_close($conn);
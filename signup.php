<?php

//connection to db
require 'connection.php';

//receiving data from signup.html

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];
$regnum = $_POST['regnumber'];
$phonenum = $_POST['phonenumber'];

//inserting data into db in signup table
$sql = "INSERT INTO studentsignup (username, email, password1, cpassword, regnumber, phonenumber, phonenumber)
VALUES ('$username', '$email', '$password', '$cpassword', '$regnum', '$phonenum')";

if ($conn->query($sql) === TRUE) {

     header("Location: http://localhost/loginsystem/login.html");

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();

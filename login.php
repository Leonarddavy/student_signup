<?php
  session_start();
  //connection to db
  require 'connection.php';

  //receiving data frm login.html
  $username = $_POST['username'];
  $password = $_POST['password1'];

  //comparing sent data with data in the db
  $sql = "SELECT * FROM signup WHERE username = '$username' AND password1 = '$password'";
  $result = mysqli_query($conn, $sql);

  // Check if there is a match for the email and password in the database
  if (mysqli_num_rows($result) > 0) {
    // Redirect the user to the index page
   header("Location: http://localhost/loginsystem/authenticate.php");
    exit();
  } else {
    // Redirect the user to the login page with an error message
    header("Location: http://localhost/loginsystem/login.html?error=invalidcredentials");
    exit();
  }



    

 
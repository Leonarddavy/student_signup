<?php
  session_start();
  //connection to db
  require 'connection.php';

  //receiving data frm login.html
  $Username = $_POST['username'];
  $NewPassword = $_POST['newpassword'];
  $ConfirmNewPassword = $_POST['confirmnewpassword'];

  //comparing sent data with data in the db
  $sql = "UPDATE signup SET password1 = '$NewPassword', cpassword = '$ConfirmNewPassword' WHERE username = '$Username'";

  $result = mysqli_query($conn, $sql);

  // Check if there is a match for the email and password in the database
  if ($result === false) {
    // The update query encountered an error
    echo "Error: " . mysqli_error($conn);
} elseif (mysqli_affected_rows($conn) > 0) {
    // Rows were affected, meaning the update was successful
    header("Location: http://localhost/loginsystem/login.html");
} else {
    // No rows were affected, meaning the username was not found
    echo "Username not found or password not updated";
}




    

 
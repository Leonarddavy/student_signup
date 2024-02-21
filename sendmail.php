<?php

$email = $_POST['email'];
 
$randomstring = "qwerty";

require 'connection.php';

 function generateRandomString() {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 10);
  }
  // function checkingmail(){
  //   header("Location: http://localhost/loginsystem/checkmail.html");
  // }

 $randomstring = generateRandomString();
function verify($email, $randomstring){
    print $randomstring;
    //die();
 $sql = "INSERT INTO reseting (email, password_link)
 VALUES ('$email', '$randomstring')";

global $conn;
if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
  die();
}

}


function sendMail(){
    date_default_timezone_set('Etc/UTC');
    
    require 'PHPMailer/PHPMailerAutoload.php';

//Create a new PHPMailer instance
$mail = new PHPMailer;

//Tell PHPMailer to use SMTP
$mail->isSMTP();

$mail->SMTPDebug = 2;

//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';

//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "dwavikoech@gmail.com";

//Password to use for SMTP authentication
$mail->Password = "uvaaqthwjjfdjsfj";

//Set who the message is to be sent from
$mail->setFrom('dwavikoech@gmail.com', 'Admin');

//Set an alternative reply-to address
$mail->addReplyTo('replyto@example.com', 'First Last');

//Set who the message is to be sent to
// $mail->addAddress('dwavikoech@gmail.com', 'John Doe');

global $email;
$mail->addAddress($email, 'John Doe');


//Set the subject line
$mail->Subject = 'RESET PASSWORD';

//$randomstring = generateRandomString();
// print $randomstring;
// die();
global $randomstring;
$content="http://localhost/loginsystem/reset.php?rs=" . $randomstring;  
          
$mail->MsgHTML($content);
$mail->send();


//sendMail();

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
    }
 else
    {
    echo "sent";
    }
}

sendMail();
verify($email, $randomstring);
// checkingmail();




<?php
$EMAIL=$_POST['Email'];
$NAME=$_POST["Username"];
$con=new mysqli('localhost','root','','chat');
$sql="SELECT * FROM register WHERE (Email='".$EMAIL."' and Username='".$NAME."')";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
   $MESSAGE='Lien de validation email--->http://localhost/ChatRoom/recovery.html';
} else {
    echo "Wrong username";
}
$SUBJECT="You're passworrd";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require'C:\xampp\phpMyAdmin\vendor\autoload.php';
require("src/PHPMailer.php");
require("src/Exception.php");
require("src/SMTP.php");
require("src/OAuth.php");
require("src/POP3.php");
$mail = new PHPMailer(TRUE);
$mail->Host = "smtp.gmail.com";
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username="saimsami116@gmail.com";
$mail->Password="Elharbil123";///my passworrd
$mail->SMTPSecure="ssl";
$mail->Port=465;
$mail->Subject=$SUBJECT ."  FROM  ". $NAME;
$mail->Body=$MESSAGE;
$mail->setFrom($EMAIL);
$mail->addAddress("$EMAIL");
if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}

$con->close();
header('Location: login.html');



?>
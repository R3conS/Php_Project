<?php
$USERN=$_POST['Username'];
$PASS=$_POST['Password'];
session_start();
$_SESSION["Email"]=$_POST['Email'];
$Email=$_POST['Email'];
$con= new mysqli('localhost','root','','chat');
$sql="INSERT INTO register(Username,Password,Email) VALUES('".$USERN."','".md5($PASS)."','".$Email."')";
$result = mysqli_query($con, $sql) or die ("Username Already Exists");
$MESSAGE='Lien de validation email--->http://localhost/ChatRoom/Activation.php?id='.$USERN;
$SUBJECT="Validation Mail";
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
$mail->Subject=$SUBJECT ."FROM". $USERN;
$mail->Body=$MESSAGE;
$mail->setFrom($Email);
$mail->addAddress("$Email");
if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  echo 'Message has been sent.';
}
$con->close();
header('Location: login.html');
?>
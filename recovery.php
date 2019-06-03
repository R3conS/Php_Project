<?php
session_start();
$con=new mysqli('localhost','root','','chat');
$sql="update register set Password='".md5($_POST['Password'])."' Where Username='".$_POST["Username"]."'";
mysqli_query($con, $sql);
$con->close();
header('location : login.html');
?>
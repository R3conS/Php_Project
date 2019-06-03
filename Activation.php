<?php
session_start();
$con= new mysqli('localhost','root','','chat');
$sql="UPDATE register set validation=1 where Username='".$_GET["id"]."'";
$result = mysqli_query($con, $sql);
header('Location: login.html');
?>
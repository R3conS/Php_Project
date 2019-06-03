<?php
$con=new mysqli('localhost','root','','chat');
$sql="update register set Password='".md5($_POST['Password'])."' Where Username='".$_POST["Username"]."'";
echo $sql;
$rep=mysqli_query($con, $sql);
$con->close();
header('refresh:0;login.html');
?>
<?php

session_start();
$id_room=$_SESSION["room"];
$con = new mysqli('localhost','root','','chat');
$sql="Delete from room WHERE id_room=".$id_room;
$apply=mysqli_query($con,$sql);
header("location:room_holder.php");



?>
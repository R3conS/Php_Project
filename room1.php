<?php
session_start();
$_SESSION['room']=$_GET["id"];
if (isset($_POST["emot"]))
$_SESSION["input"]=$_POST['MSG']." ".$_POST["emot"];
if (isset($_POST["MSG"]) && isset($_FILES['image']) && !isset($_POST["emot"])){
unset($_SESSION["input"]);
$file=addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
$MSG=$_POST['MSG'];
$id_client_querry="select id from register where Username='".$_SESSION['Username']."'";
$con = new mysqli('localhost','root','','chat');
$id_client=mysqli_query($con,$id_client_querry);
$id_room=$_GET["id"];
$id=mysqli_fetch_assoc($id_client);
$querry="insert into room(id_client,id_room,message,images) VALUES('".$id["id"]."','".$_GET["id"]."','".$MSG."','".$file."')";
$sql=mysqli_query($con,$querry);
$con->close();
header('location:room_holder.php?id="'.$_SESSION["room"].'"');
}
else{
header('location:room_holder.php');
}
?>

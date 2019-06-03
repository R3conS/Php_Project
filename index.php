<!DOCTYPE html>
<html>
    <link rel="stylesheet" href="style.css" />
<head>
	<title>ChatRoom</title>
<?php 
session_start();
echo "<p>Welcome 	".$_SESSION['Username']."</p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href='logout.php'><p>&nbsp;&nbsp;&nbsp; --> Wanna Logout</p></b></a>";
echo "<br>";
?>
<?php 
echo "<p>Available Rooms:</p><br>";
echo '<b><a href="room1.php?id=1"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->ROOM I</p></b>';
echo '<b><a href="room1.php?id=2"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->ROOM II</p></b>';
echo '<b><a href="room1.php?id=3"><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->ROOM III</p></b>';
?>


</head>
<body>

</body>
</html>
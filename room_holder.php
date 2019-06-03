<?php
session_start();
$con = new mysqli('localhost','root','','chat');
$id_room=$_SESSION["room"];
$querry="select message,time,id_client,images from room where id_room='".$_SESSION['room']."' ORDER BY time asc";
$sql=mysqli_query($con,$querry);
$result=mysqli_fetch_assoc($sql);
while ($row = mysqli_fetch_array($sql)) {
  $foruser="select Username from register where id='".$row[2]."'";
  $apply=mysqli_query($con,$foruser);
  $client=mysqli_fetch_assoc($apply);
  echo '<div class="container darker">';
    echo '<p><strong>' . $row[1] . '</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>' . $client['Username'] . '</strong> : ' . htmlentities($row[0]). '</p>';
    echo '</div>';
    if ($row[3])
    echo '<br><img src="data:image/jpeg;base64,'.base64_encode( $row[3] ).'"/>';}
?>
<!DOCTYPE html>
<html>
<body>
<head>
<?php
if($id_room==1){
	echo '<form action="room1.php?id=1" method="post" enctype="multipart/form-data">';
}
else if ($id_room==2){
	echo '<form action="room1.php?id=2" method="post" enctype="multipart/form-data">';
}
else if ($id_room==3){
	echo '<form action="room1.php?id=3" method="post" enctype="multipart/form-data">';
}
?>
		<div class="container">
		<label for="Message"><b style="animation: change 2s infinite;font-weight: bolder"><?php echo "Connected as 	".$_SESSION['Username']."  On room".$_SESSION['room'];?></b><a href="deleteconv.php" style="animation: change 2s infinite;font-weight: bolder;margin-left: 100px">Delete Conversation</a><a href="index.php" style="animation: change 2s infinite;font-weight: bolder;margin-left: 100px">Change Room</a></label>
		<input type="textarea" size="100" style="background: transparent" placeholder="Enter votre Message"  name="MSG" <?php if(!empty($_SESSION['input']))echo "value = '".$_SESSION["input"]."'";?> >
		<input type="file" name="image">
    <button type="submit">submit</button>
    <input type="submit" name="emot" value="&#128564;">       
    <input type="submit" name="emot" value="&#128560;"> 
    <input type="submit" name="emot" value="&#128561;">       
    <input type="submit" name="emot" value="&#129312;"> 
    <input type="submit" name="emot" value="&#129317;">       
    <input type="submit" name="emot" value="&#129325;"> 
    <input type="submit" name="emot" value="&#129324;">       
    <input type="submit" name="emot" value="&#128540;"> 
    <input type="submit" name="emot" value="&#128534;">       
    <input type="submit" name="emot" value="&#128526;">   
    <input type="submit" name="emot" value="&#128525;">    
<!--    <input type="submit" name="emot" value="&#128519;">
    <input type="submit" name="emot" value="&#128521;">
    <input type="submit" name="emot" value="&#128520;">
    <input type="submit" name="emot" value="&#128565;">-->

</head>
</body>
</html>
<?php
$con->close();
?>
<style>
	@keyframes change{
	0%{color:#ffe500; }
	25%{color:#3fe209; }
	50%{color:#0ee2f9;}
	75%{color:#060cce; }
	100%{color:#ba05ce;}
}
a{
	text-decoration: none;
}
a:visited{
	color: #0f0e0e;
}
body {
	background:url(images/pic1.jpg);
	background-size: cover;
	background-position: center-bottom;
	font-family: sans-serif;
  margin: 0 auto;
  max-width: 800px;
  padding: 0 20px;
}

.container {
  border: 2px solid #dedede;
  background-color: #f1f1f1;
  border-radius: 5px;
  padding: 10px;
  margin: 10px 0;
}

.darker {
  border-color: #ccc;
  background-color: #ddd;
}

.container::after {
  content: "";
  clear: both;
  display: table;
}

.container img {
  float: left;
  max-width: 60px;
  width: 100%;
  margin-right: 20px;
  border-radius: 50%;
}

.container img.right {
  float: right;
  margin-left: 20px;
  margin-right:0;
}

.time-right {
  float: right;
  color: #aaa;
}

.time-left {
  float: left;
  color: #999;
}
</style>

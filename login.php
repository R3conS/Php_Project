<?php
			session_start();
			$_SESSION['Username']=$_POST['Username'];
			$USERN=$_POST['Username'];
			$PASSW=$_POST['Password'];
			$con = new mysqli('localhost','root','','chat');
			$Validation="SELECT Validation FROM register WHERE Username='".$USERN."' AND Password= '".md5($PASSW)."'";
			
			$id="SELECT id FROM register WHERE Username='".$USERN."' AND Password= '".md5($PASSW)."'";
			$validation = mysqli_query($con, $Validation);
			$id=mysqli_query($con,$id);
			$id_user = mysqli_fetch_assoc($id);
			$valid = mysqli_fetch_assoc($validation);
			$_SESSION['id']=$id;
			if($id_user&&$valid['Validation']){
			header("refresh:0;url=index.php");
			}
			else{
			echo("<b>Wrong Password Or Username <a href='Register.html'/>Register Here
				<br><a href='Forgotpass.html'/> Forgotpass");
			header('location:Register.html');
			}

         ?>

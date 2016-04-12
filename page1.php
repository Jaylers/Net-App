<?php  
	session_start();
	if(!empty($_POST['logout'])){
		echo"<script language=\"JavaScript\">";
		echo"alert('Log out')";
		echo"</script>";
		session_unset(); 
	}
	if(!empty($_SESSION["ID"])){
		echo "Welcome : ".$_SESSION["Nickname"];
		echo "<form align='right' name='form1' id='form1' method='post' action='page1.php' >
				<input type='hidden' name='logout' value='logout' >
				<input type='submit' name='logout' value='Logout' >
			</form>";
	}
	else {
		echo "<a href='#'><input type='submit' name='register' value='สมัครสมาชิก' ></a>";
		echo "<a href='loginpage.php'><input type='submit' name='login' value='Login' ></a>";
	}
	
?>

	

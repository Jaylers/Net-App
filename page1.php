<!DOCTYPE html>
<html lang="en">
<head>  
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="embed.css" rel="stylesheet" >
<meta charset="utf-8">
<style>
  body {background-color:lightgrey;}
  h5   {color:purple;}
  p    {color:green;}
</style>
<style type="text/css">

body,td,th {
  color: #00F;
}
.Head {
  font-size: 70px;
}
.ntext {
  font-size: 24px;
  color: #03F;
}
</style>

<title>Profile</title>
</head>
<style>
.row-eq-height {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
}
</style>
<body>

<div class="container">
	<div class="row">
		<!--ส่วนบาร์-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="page1.php"> Main </a>
            </li>
			<?php  
				session_start();
				if(!empty($_POST['logout'])){
					echo"<script language=\"JavaScript\">";
					echo"alert('Log out')";
					echo"</script>";
					session_unset(); 
				}
				if(!empty($_SESSION["ID"])){
					echo "<li style='float: right;'>Welcome : ".$_SESSION["Nickname"]."</li>";
					
					echo "<li style='float: right;'><a><form  name='form1' id='form1' method='post' action='page1.php' >
							<input type='hidden' name='logout' value='logout' >
							<input type='submit' name='logout' value='Logout' >
						</form></a></li>";
					echo "<li style='float: right;'><a href='#'><input align='right' type='submit' name='creat' value='สร้างบล็อก' ></a></li>";
				}
				else {
					echo "<li style='float: right;'><a href='#'>สมัครสมาชิก</a></li>";
					echo "<li style='float: right;'><a href='loginpage.php'>Login</a></li>";
				}
			?>
        </ul>

        <img src="test/bg.jpg">

    </div>
</div>

</body>
</html>




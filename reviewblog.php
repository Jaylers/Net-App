<?php  
	session_start();
	if(!empty($_POST['logout'])){
		echo"<script language=\"JavaScript\">";
		echo"alert('Log out')";
		echo"</script>";
		session_unset(); 
	}
	if(!empty($_SESSION["ID"])){
		$username=$_SESSION["Nickname"];
	}
	else {
		$username="unknow";
	}
?>

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
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<div class="container">
<div class="row">
          <ul class="nav nav-tabs">
            <li>
            <a href="Home.php"> Main </a>
            </li>
            <li class="active">
            	<a href="#"> Review </a>
            </li>
            <?php
            if( $username != "unknow")
            { ?>
              <li style='float: right;'>
              	<form align='right' name='form1' id='form1' method='post' action='Home.php' >
				<input type='hidden' name='logout' value='logout'>
				<input type='submit' name='logout' value='Log out' >
				</form>
              </li>
              <?php } ?>
              <?php
            if( $username == "unknow")
              { ?>
          		<li style='float: right;'>
             		<a href="loginpage.php"> Sign in </a>
             	</li>
          		<li style='float: right;'>
             		<a href="#"> Register </a>
            	</li>
              <?php } ?>
          </ul>
     </div>
     <span class="gtext"> Welcome : <?php echo $username ?> </span>
    <pre>
        <strong><br/><br/><span class="Head"> Name of movie </span></strong><br>
      <img class="displayed" src="image/Profile.jpg" align="center" width="300"/>
      <span class="displaytext">
        detail
      </span>
    </pre>
    <pre>
        <strong><br/><br/><span class="Head"> Name of movie </span></strong><br>
      <img class="displayed" src="image/Profile.jpg" align="center" width="30"/>
      <span class="displaytext">
        detail
      </span>
    </pre>
    <div class="row">
<img src="image/cover.jpg" align="middle"/>
</body>
</html>

	

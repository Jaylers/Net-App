<?php 
	$rid = $_GET['reid'];
	echo "review : ".$rid;
	session_start();
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
    <ol class="breadcrumb"><br>
  	<li>
    	<?php  
        $conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');
		$sth = $conndb->prepare("SELECT * FROM review where reviewid = $rid ");
		$sth->execute();
		if ($sth !== false) {
		    while($row = $sth->fetch()) {
		    	?> <ol class="breadcrumb"><br>
  				<li>
  				<?php
		  		echo "<p align='center'><img src='".$row['image']."'style='width:500;height:300px;border:0;''><p>
		  			<p align='left'><font size='6'>เรื่อง : ".$row['reviewname']."</fort> <font size='3'> review poit : ".$row['rate']."</fort> </p>
		  			<p align='left'><font size='4'>".$row['detail']."</fort></p>
		  			<p align='left'><font size='2'>".$row['datetime']."</fort> <font size='2' color='blue'>".$row['owner']."</fort>  </p>";
		  			?>
		  		</li>
		  		<?php echo "</ol>";
		    }
		}
		$conndb = null; ?>
    </li>

        <?php  
        $conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');
		$sth = $conndb->prepare("SELECT * FROM comment");
		$sth->execute();
		if ($sth !== false) {
		    while($row = $sth->fetch()) {
		    	?> <ol class="breadcrumb"><br>
  				<pre>
  				<?php
		  		echo "<span class='displaytext'>
		  			<font size='3'>เรื่อง : ".$row['commentof']."</fort>
		  			<font size='4'>".$row['detail']."</fort>
		  			<font size='2'>".$row['datetime']."</fort> <font size='2' color='blue'>".$row['owner']."</fort> </span>";
		  			?>
		  		</pre>
		  		<?php echo "</ol>";
		    }
		}
		$conndb = null;
        ?>


<ol class="breadcrumb"><br>
<li>
new comment
</li>

<p align="center"><img src="image/cover.jpg"/></p>
</body>
</html>

	

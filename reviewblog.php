<?php 
	if(!empty($_GET['reid'])){
		$rid = $_GET['reid'];
	}
	session_start();
	if(!empty($_SESSION["ID"])){
		$username=$_SESSION["Nickname"];
	}
	else {
		$username="unknow";
	}

    if(isset($_POST['detail']) and isset($_POST['agree']) and isset($_POST['rid']))
    {
       	$commentof = "unknow";
       	$rid= $_POST['rid'];
        $conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');
		$sth = $conndb->prepare("SELECT reviewname FROM review WHERE reviewid = '$rid ");
		$sth->execute();
		if ($sth !== false) {
		    while($row = $sth->fetch()) {
		    	$commentof = $row['reviewname'];
		    }
		}
		$conndb = null;


	    if($_POST['agree']!=1){
	    	$agree= 0;
	    }else $agree= 1;
	    $detail= $_POST['detail'];
	    $owner= $username;

        $servername ="localhost";
        $username ="root";
        $password ="";
        $dbname ="moviesreview";
        $conn = new mysqli($servername,$username,$password,$dbname);

        if($conn->connect_error){
        	die("Connection failed: ".$conn->connect_error);
        }
        $sql = "INSERT INTO Customer(detail,agree,owner,commentof) VALUES ('$detail','$agree','$owner','$commentof')";

        $conn->query($sql);
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>  
<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="bootstrap/css/embed.css" rel="stylesheet" >
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
    <?php  
      if(!empty($_SESSION["ID"])){
        echo "<span class='gtext'> Welcome : $username </span>";
      }
    ?>
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
		  		<p align='left'><font size='6'>เรื่อง : ".$row['reviewname']."</fort> <font size='3'> review poit : ".$row['rate'].
		  		"</fort> </p>
		  			<p align='left'><font size='4'>".$row['detail']."</fort></p>
		  			<p align='left'><font size='2'>".$row['datetime']."</fort> <font size='2' color='blue'>".$row['owner'].
		  			"</fort>  </p>";
		  			?>
		  		</li>
		<?php  
        $conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');
		$sth = $conndb->prepare("SELECT agree FROM COMMENT");
		$numofagree = 0;
		$numofdisagree = 0;
		$sth->execute();
		if ($sth !== false) {
		    while($row = $sth->fetch()) {
		    	if($row['agree']==1){
		    		$numofagree=$numofagree+1;
		    	}else{$numofdisagree = $numofdisagree+1;}
		    }
		}
		$conndb = null;
		echo $numofagree." Person agree and ".$numofdisagree." Person disagree";
        ?>
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
		  			<font size='3'>".$row['detail']."</fort>
		  			<font size='2'>".$row['datetime']."
		  			</fort> <font size='2' color='blue'>".$row['owner']."</fort> </span>";
		  			?>
		  		</pre>
		  		<?php echo "</ol>";
		    }
		}
		$conndb = null;
        ?>

<?php if( $username != "unknow") { ?>

<ol class="breadcrumb"><br>
<li>
	<form method="post" action="reviewblog.php">
		<p> Comment <br/><textarea name="detail" id="detail" cols="40" rows="3"></textarea>
		<br/><input type="checkbox" name="agree" value="1" /> Agree
		<?php $rid; ?>
		<br/><br/><input type="submit" name="mysubmit" id="mysubmit" value="Submit"/> </p> 

	</form>
</li>
<?php } ?>

<p align="center"><img src="image/cover.jpg"/></p>
</body>
</html>
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
<script language="javascript">
	function fncSubmit()//ฟังชั่นตรวจว่ากรอกข้อมูลครบไหม
	{
		if(document.form1.Id.value == "")
		{
			alert('Please input ID');
			document.form1.secsubject.focus();
			return false;
		} 
		if(document.form1.Password.value == "")
		{
			alert('Please input Password');
			document.form1.teacher.focus();       
			return false;
		}  

		document.form1.submit();
	}

</script>

<div class="container">
	<div class="row">

<br><br><br><br><br><br><br>
<p align="center"><strong><font size="50">Log in</font></strong><br></p>
<br>
<form  align="center" name="form1" id="form1" method="post" action="loginpage.php" onSubmit="JavaScript:return fncSubmit();" >
	<p>Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="varchar" id="Id" name="Id" size="20"></input></p>
	<p>Password <input type="varchar" id="Password" name="Password" size="20"></input></p>
	<p>
		<input type="submit" name="submit" value="Login" >
		<input type="reset" name="reset" value="Reset" >
		<a href="Home.php">กลับหน้าแรก</a>
	</p>
</form>

<?php  
	if(!empty($_POST['Id']) and !empty($_POST['Password'])) {
		/*echo "<br><br>ID : ".$_POST['Id'];
		echo "<br>Password :".$_POST['Password'];*/
		$conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');
		$ID=$_POST['Id'];
		$Password=$_POST['Password'];
		$sth = $conndb->prepare("SELECT * FROM member where email='$ID' and password='$Password'");
		$sth->execute();
		if ($row = $sth->fetch())  {
		    echo"<script language=\"JavaScript\">";
			echo"alert('สำเร็จ')";
			echo"</script>";
			session_start();
			$_SESSION["ID"] = $ID;
			$_SESSION["Nickname"] = $row["nickname"];
			header("LOCATION: Home.php");
		}
		else{
			echo"<script language=\"JavaScript\">";
			echo"alert('ไม่สำเร็จ')";
			echo"</script>";
		}

		$conndb = null;
	}
?>


        

    </div>
</div>

</body>
</html>
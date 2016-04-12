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

<form name="form1" id="form1" method="post" action="loginpage.php" onSubmit="JavaScript:return fncSubmit();" >
	<p>ID <input type="varchar" id="Id" name="Id" size="20"></input></p>
	<p>Password <input type="varchar" id="Password" name="Password" size="20"></input></p>
	<p>
		<input type="submit" name="submit" value="Submit" >
		<input type="reset" name="reset" value="Reset" >
		<a href="page1.php">กลับหน้าแรก</a>
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
			header("LOCATION: page1.php");
		}
		else{
			echo"<script language=\"JavaScript\">";
			echo"alert('ไม่สำเร็จ')";
			echo"</script>";
		}

		$conndb = null;
	}
?>


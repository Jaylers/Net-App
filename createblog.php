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

<title>New Review Blog</title>
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

    if(document.form1.reviewname.value == "")
    {
      alert('Please input reviewname');
      document.form1.reviewname.focus();
      return false;
    } 
    if(document.form1.detail.value == "")
    {
      alert('Please input detail');
      document.form1.detail.focus();       
      return false;
    }  
    if(document.form1.image.value == "")
    {
      alert('Please input image');
      document.form1.image.focus();       
      return false;
    } 
    if(document.form1.rate.value == "")
    {
      alert('Please input rate');
      document.form1.rate.focus();       
      return false;
    }  
    

    document.form1.submit();
  }

</script>

<div class="container">
	<div class="row">
		<!--ส่วนบาร์-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="Home.php"> Main </a>
            </li>
			<?php  
				session_start();
				$username = "unknow";
				if(!empty($_POST['logout'])){
					echo"<script language=\"JavaScript\">";
					echo"alert('Log out')";
					echo"</script>";
					session_unset(); 
				}
				if(!empty($_SESSION["ID"])){
					$username = $_SESSION["Nickname"];
					
					echo "<li style='float: right;'> <a> <form  name='form2' id='form2' method='post' action='Home.php' >
							<input type='hidden' name='logout' value='logout' >
							<input type='submit' name='logout' value='Logout' >
						</form></a></li>";
					echo "<li style='float: right;'><a href='#'><input align='right' type='submit' name='creat' value='สร้างบล็อก' ></a></li>";
				}
				else {
					echo "<li style='float: right;'><a href='#'> Register </a></li>";
					echo "<li style='float: right;'><a href='loginpage.php'>Login</a></li>";
				}
			?>
        </ul>
        <span class="gtext"> Welcome : <?php echo $username ?> </span>
        <br><br>
        <hr size="10"> 
        <strong><font size='30'>Create Blog </font></strong>
        <br><br>
        <form name="form1" id="form1" method="post" action="createblog.php" onSubmit="JavaScript:return fncSubmit();" >
        	<p>Movie Name <input type="varchar" id="reviewname" name="reviewname" size="100"></input></p>
        	<p>Detail</p>
        	<textarea name="detail" id="detail" rows="10" cols="100"></textarea>
        	<p>URL Image <input type="varchar" id="image" name="image" size="100"></input></p>
        	<p>Rate <select id="rate" name="rate">
            <option value="">เลือกคะแนน</option>
        		<option value="0">0</option>
        		<option value="1">1</option>
        		<option value="2">2</option>
        		<option value="3">3</option>
        		<option value="4">4</option>
        		<option value="5">5</option>
        		<option value="6">6</option>
        		<option value="7">7</option>
        		<option value="8">8</option>
        		<option value="9">9</option>
        		<option value="10">10</option>
        	</select></p>
        	<?php  
        		echo "<input type='hidden' name='owner' value='".$_SESSION["memberid"]."' >";
            echo "<input type='hidden' name='datetime' value='".date('Y-m-d H:i:s')."' >";
        	?>
        	<input type="submit" name="submit" value="Submit" >
			    <input type="reset" name="reset" value="Reset" >
        </form>

        <?php 
          if(!empty($_POST['reviewname']) and !empty($_POST['detail']) and !empty($_POST['image']) and !empty($_POST['rate']) and !empty($_POST['owner']) and !empty($_POST['datetime'])) {
            /*
            echo "reviewname =".$_POST['reviewname']."<br>detail = ".$_POST['detail']."<br>rate".$_POST['rate']."<br>owner=".$_POST['owner']."<br>date time".$_POST['datetime'];*/
            $conndb = new PDO('mysql:host=localhost;dbname=moviesreview;charset=utf8','root','');

            $sql = "INSERT INTO review(`reviewname`, `datetime`, `detail`, `image`, `rate`, `owner`) VALUES (:reviewname,:datetime,:detail,:image,:rate,:owner)";
                
            $sth = $conndb->prepare($sql);
            $sth->execute(
            Array(
                  'reviewname' => $_POST['reviewname'],
                  'datetime' => $_POST['datetime'],
                  'detail' => $_POST['detail'],
                  'image' => $_POST['image'],
                  'rate' => $_POST['rate'],
                  'owner' => $_POST['owner']           
                    )
            );
            $conndb = null;
            echo"<script language=\"JavaScript\">";
            echo"alert('เพิ่มข้อมูลสำเร็จแล้ว')";
            echo"</script>";
            header("LOCATION: Home.php");
            
          }
        ?>
    </div>
</div>
		

</body>
</html>
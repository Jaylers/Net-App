<!DOCTYPE html>
<html lang="en">
<head>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="my.css" rel="stylesheet">
  <meta charset="utf-8">
  <style type="text/css">
    .nomal {
      font-family: Arial, Helvetica, sans-serif;
    }
    .header {
      font-weight: bold;
      font-size: x-large;
    }
  </style>
  <title>Register Form</title>
</head>
<script src="js/jquery-2.2.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jqBootstrapValidation.js"></script>
<script>
  $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(); } );
</script>
<script>
  $(document).ready(function(){
    $('#inputEmail').on("keyup blur",function(){check_email();}); 
    $('#username').on("keyup blur",function(){check_username();}); 
  });
  function check_email(){
    var email = $('#inputEmail').val();
    jQuery.ajax({
      type: 'POST',
      url: 'regisprocess.php',
      data: 'email='+ email,
      cache: false,
      success: function(response){
        if(response != 0){
          $('#feedback').html("<div class=\"alert alert-danger\" style=\"display:inline-block;\">Email นี้ได้ถูกใช้แล้ว.</div>").show();
          $('input[type="submit"]').prop('disabled', true);
        }
        else{
          $('#feedback').html("<div class=\"alert alert-success\" style=\"display:inline-block;\">Email นี้สามารถใช้ได้.</div>").show();
          $('input[type="submit"]').prop('disabled', false);
        }
      }
    });
  }
  function check_username(){
    var username = $('#username').val();
    jQuery.ajax({
      type: 'POST',
      url: 'regisprocess2.php',
      data: 'username='+ username,
      cache: false,
      success: function(response){
        if(response != 0){
          $('#feedback2').html("<div class=\"alert alert-danger\" style=\"display:inline-block;\">username นี้ได้ถูกใช้แล้ว.</div>").show();
          $('input[type="submit"]').prop('disabled', true);
        }
        else{
          $('#feedback2').html("<div class=\"alert alert-success\" style=\"display:inline-block;\">username นี้สามารถใช้ได้.</div>").show();
          $('input[type="submit"]').prop('disabled', false);
        }
      }
    });
  }
</script>

<body>
  <h1>สมัครใช้งาน</h1>
  เพื่อเข้าใช้งานระบบ อย่างเต็มรูปแบบ<br><br>

  <form class="form-horizontal" id="form1" name="register" method="post" action="regissubmit.php">
    <div class="control-group">
      <label class="control-label" for="inputEmail">Email</label>
      <div class="controls" >
        <input type="email" id="inputEmail" name="inputEmail" placeholder="ป้อนอีเมล"   data-validation-email-message="อีเมลไม่ถูกต้อง"  required>
      </div>
      <div class="controls">
        <div id = "feedback"></div>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
        <input type="password" name="inputPassword" placeholder="รหัสผ่าน" required>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputPasswordAgain">Password Again</label>
      <div class="controls">
        <input type="password" id="inputPassword2" placeholder="รหัสผ่านอีกครั้ง" data-validation-match-match="inputPassword" data-validation-match-message="รหัสผ่านไม่เหมือนกัน" >
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputFirstName">FirstName</label>
      <div class="controls">
        <input type="text" id="firstname" name="firstname" placeholder="ชื่อ" required>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputLastName">LastName</label>
      <div class="controls">
        <input type="text" id="lastname" name="lastname" placeholder="นามสกุล" required>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="inputUsername">UserName</label>
      <div class="controls">
        <input type="text" id="username" name="username" placeholder="ชื่อที่จะปรากฏบนเว็ปไซต์" required>
      </div>
      <div class="controls">
        <div id = "feedback2"></div>
      </div>
    </div>
    <div class="control-group">
      <div class="controls">
        <input type="submit" class="btn btn-success" id="submitbottom" value="สมัครใช้งาน">
        <button type="reset" class="btn btn-danger" name="Reset" id="button" value="reset" onclick="resets()"/>ล้างค่า</button>
		<input type="button" class="btn btn-success" name="home" value="Home" ONCLICK="window.location.href='Home.php'" >
      </div>
    </div>
  </form>
</body>
</html>
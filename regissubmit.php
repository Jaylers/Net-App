<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'moviesreview';

    try {
    $conn = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO member (email, password, nickname,firstname,lastname)
    VALUES ('$_POST[inputEmail]', '$_POST[inputPassword]', '$_POST[username]','$_POST[firstname]','$_POST[lastname]')";
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?> 
<script>
alert("ลงทะเบียนเสร็จสิ้น");
window.location = 'http://127.0.0.1/Net-App/Home.php';
</script>
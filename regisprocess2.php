<?php
    $hostname = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'moviesreview';

    try 
    {
        $dbh = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    }
    catch(PDOException $e)
    {
        echo $e->getMessage();
    }   

    $stmt = $dbh->prepare("SELECT * FROM member where nickname = ?");
    $stmt->execute(array("$_POST[username]"));
    echo $stmt->rowCount();
?>
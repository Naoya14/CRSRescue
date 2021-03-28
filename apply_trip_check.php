<?php
session_start();
try
{

  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $id = $_GET['id'];
  $username = $_GET['username'];
  $applicationDate = date("Y/m/d");
  $status = 'New';

  $id = htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
 
  $sql_checkapplication = 'SELECT applicationID FROM tb_applications WHERE username_volunteer=? AND tripID=?';
  $prepare = $dbh->prepare($sql_checkapplication);
  $prepare->bindValue(1, $_SESSION['username'], PDO::PARAM_STR);
  $prepare->bindValue(2, $id, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  if($result==false)
  {
    $sql = 'INSERT INTO tb_applications(applicationDate, status, username_staff, username_volunteer) VALUES (?, ?, ?, ?)';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(1, $applicationDate, PDO::PARAM_STR);
    $prepare->bindValue(2, $status, PDO::PARAM_STR);
    $prepare->bindValue(3, $username, PDO::PARAM_STR);
    $prepare->bindValue(4, $_SESSION['username'], PDO::PARAM_STR);
    
    $prepare->execute();
  
    $dbh = null;
  
    echo '<script>alert("You apply for the trip successfully");window.location = "volunteerMenu.php";</script>';
  }
  else
  {
    echo '<script>alert("You already applied for this trip");window.location = "applyTrip.php";</script>';
  }
} 
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>
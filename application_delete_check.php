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
 
  $sql_deleteapplication = 'DELETE FROM tb_applications WHERE applicationID=?';
  $prepare = $dbh->prepare($sql_deleteapplication);
  $prepare->bindValue(1, $id, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  echo '<script>alert("You delete your application");window.location = "applicationStatus.php";</script>';

} 
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>
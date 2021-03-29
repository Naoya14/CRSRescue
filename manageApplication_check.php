<?php
session_start();
try
{

  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $applicationID = $_SESSION['applicationID'];
  $applicationDate = $_SESSION['applicationDate'];
  $status = $_GET['status'];
  $remark = $_GET['remark'];

  $applicationID = htmlspecialchars($applicationID, ENT_QUOTES, 'UTF-8');
  $applicationDate = htmlspecialchars($applicationDate, ENT_QUOTES, 'UTF-8');
  $status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');
  $remark = htmlspecialchars($remark, ENT_QUOTES, 'UTF-8');

    $sql = 'INSERT INTO tb_applications( applicationID,applicationDate,status,remark) VALUES (?,?,?, ?)';
    $prepare = $dbh->prepare($sql);

    $prepare->bindValue(1, $applicationID, PDO::PARAM_STR);
    $prepare->bindValue(2, $applicationDate, PDO::PARAM_STR);
    $prepare->bindValue(3, $status, PDO::PARAM_STR);
    $prepare->bindValue(4, $remark, PDO::PARAM_STR);
    $prepare->execute();

    $dbh = null;

    echo '<script>alert("You updated the application successfully");window.location = "manageApplication.php";</script>';

}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

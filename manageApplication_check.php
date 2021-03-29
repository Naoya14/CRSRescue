<?php
session_start();
try
{

  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $applicationID = $_POST['ID'];
  $status = $_POST['status'];
  $remark = $_POST['remark'];

  $applicationID = htmlspecialchars($applicationID, ENT_QUOTES, 'UTF-8');
  $status = htmlspecialchars($status, ENT_QUOTES, 'UTF-8');
  $remark = htmlspecialchars($remark, ENT_QUOTES, 'UTF-8');

    $sql = 'UPDATE tb_applications SET status=?, remark=? WHERE applicationID=?';
    $prepare = $dbh->prepare($sql);
    
    $prepare->bindValue(1, $status, PDO::PARAM_STR);
    $prepare->bindValue(2, $remark, PDO::PARAM_STR);
    $prepare->bindValue(3, $applicationID, PDO::PARAM_STR);
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

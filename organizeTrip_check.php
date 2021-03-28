<?php
session_start();
try
{
  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $username = $_POST['username'];
  $password = $_POST['password'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $position = $_POST['position'];
  $dateJoin = date ('Y-m-d', strtotime($_POST['date']));

  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

  $position = htmlspecialchars($position, ENT_QUOTES, 'UTF-8');
  $dateJoin = htmlspecialchars($dateJoin, ENT_QUOTES, 'UTF-8');

  $sql_checkusername = 'SELECT username FROM tb_staffs WHERE username=?';
  $prepare = $dbh->prepare($sql_checkusername);
  $prepare->bindValue(1, $username, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  if($result==false)
  {
    $sql_profile = 'INSERT INTO tb_staffs(username, password, name, phone, position, dateJoin) VALUES(?, ?, ?, ?, ?, ?)';
    $prepare = $dbh->prepare($sql_profile);
    $prepare->bindValue(1, $username, PDO::PARAM_STR);
    $prepare->bindValue(2, $password, PDO::PARAM_STR);
    $prepare->bindValue(3, $name, PDO::PARAM_STR);
    $prepare->bindValue(4, $phone, PDO::PARAM_STR);
    $prepare->bindValue(5, $position, PDO::PARAM_STR);
    $prepare->bindValue(6, $dateJoin, PDO::PARAM_STR);
    $prepare->execute();

    $dbh = null;

    echo '<script>alert("Record staff successfully");window.location = "managerMenu.php";</script>';
    exit();
  }
  else
  {
    echo '<script>alert("This Username is already used");window.location = "recordStaff.php";</script>';
  }
}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

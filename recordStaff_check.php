<?php

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
  $dateJoin = date ('Y-m-d', strtotime($_POST['dateJoin']));

  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');

  $position = htmlspecialchars($position, ENT_QUOTES, 'UTF-8');
  $dateJoin = htmlspecialchars($dateJoin, ENT_QUOTES, 'UTF-8');

  $sql_profile = 'INSERT INTO tb_staffs(username, password, name, phone, position,dateJoin) VALUES(?, ?, ?, ?,?,?)';
  $prepare = $dbh->prepare($sql_profile);
  $prepare->bindValue(1, $username, PDO::PARAM_STR);
  $prepare->bindValue(2, $password, PDO::PARAM_STR);
  $prepare->bindValue(3, $name, PDO::PARAM_STR);
  $prepare->bindValue(4, $phone, PDO::PARAM_STR);
  $prepare->bindValue(5, $position, PDO::PARAM_STR);
  $prepare->bindValue(6, $dateJoin, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  if($result==false)
  {
    echo '<script>alert("Username or Password does not match");window.location = "staffLogin.php";</script>';
  }
  else
  {
    session_start();
    $_SESSION['m_login'] = 1;
    $_SESSION['username'] = $username;
    header('Location: managerMenu.php');
    exit();
  }
}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

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
  $country = $_POST['country'];
  $gender = $_POST['gender'];

  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
  $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
  $gender = htmlspecialchars($gender, ENT_QUOTES, 'UTF-8');

  $sql_checkusername = 'SELECT username FROM tb_volunteers WHERE username=?';
  $prepare = $dbh->prepare($sql_checkusername);
  $prepare->bindValue(1, $username, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  if($result==false)
  {
    $sql = 'INSERT INTO tb_volunteers(username, password, name, phone, country, gender) VALUES (?, ?, ?, ?, ?, ?)';
    $prepare = $dbh->prepare($sql);
    $prepare->bindValue(1, $username, PDO::PARAM_STR);
    $prepare->bindValue(2, $password, PDO::PARAM_STR);
    $prepare->bindValue(3, $name, PDO::PARAM_STR);
    $prepare->bindValue(4, $phone, PDO::PARAM_STR);
    $prepare->bindValue(5, $country, PDO::PARAM_STR);
    $prepare->bindValue(6, $gender, PDO::PARAM_STR);
  
    $prepare->execute();
  
    $dbh = null;
  
    session_start();
    $_SESSION['v_login'] = 1;
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['name'] = $name;
    $_SESSION['phone'] = $phone;
    $_SESSION['country'] = $country;
    echo '<script>alert("Sign Up successfully")';
    header('Location: volunteerMenu.php');
    exit();
  }
  else
  {
    echo '<script>alert("This Username is already used");window.location = "signup.php";</script>';
  }
} 
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>
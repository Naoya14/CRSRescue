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

  $username = htmlspecialchars($username, ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');

  $sql = 'SELECT username, position FROM tb_staffs WHERE username=? AND password=?';
  $prepare = $dbh->prepare($sql);
  $prepare->bindValue(1, $username, PDO::PARAM_STR);
  $prepare->bindValue(2, $password, PDO::PARAM_STR);
  $prepare->execute();

  $result = $prepare->fetch(PDO::FETCH_ASSOC);

  if($result==false)
  {
    echo '<script>alert("Username or Password does not match");window.location = "staffLogin.php";</script>';
  }
  else
  {
    if ($result['position'] == 'Manager')
    {
      session_start();
      $_SESSION['m_login'] = 1;
      $_SESSION['username'] = $result['username'];
      header('Location: managerMenu.php');
      exit();
    }
    else
    {
      session_start();
      $_SESSION['s_login'] = 1;
      $_SESSION['username'] = $result['username'];
      header('Location: staffMenu.php');
      exit();
    }
  }
}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

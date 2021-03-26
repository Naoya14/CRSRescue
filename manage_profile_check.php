<?php
session_start();
try
{
  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $name = $_POST['name'];
  $password = $_POST['password'];
  $phone = $_POST['phone'];
  $country = $_POST['country'];

  $type = $_POST['type'];
  $date = date ('Y-m-d', strtotime($_POST['date']));
  $image = $_FILES['image'];

  $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
  $password = htmlspecialchars($password, ENT_QUOTES, 'UTF-8');
  $phone = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
  $country = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');

  $type = htmlspecialchars($type, ENT_QUOTES, 'UTF-8');
  $date = htmlspecialchars($date, ENT_QUOTES, 'UTF-8');

  $sql_profile = 'UPDATE tb_volunteers SET name=?, password=?, phone=?, country=? WHERE username=?';
  $prepare = $dbh->prepare($sql_profile);
  $prepare->bindValue(1, $name, PDO::PARAM_STR);
  $prepare->bindValue(2, $password, PDO::PARAM_STR);
  $prepare->bindValue(3, $phone, PDO::PARAM_STR);
  $prepare->bindValue(4, $country, PDO::PARAM_STR);
  $prepare->bindValue(5, $_SESSION['username'], PDO::PARAM_STR);
  $prepare->execute();

  if(!(strcmp($type, "Choose") == 0))
  {
    if($image['size'] > 0)
    {
      if($image['size'] > 10000000)
      {
        echo '<script>alert("The image is too big, so can not upload");window.location = "volunteerMenu.php";</script>';
      }
      else
      {
        move_uploaded_file($image['tmp_name'], './assets/img/'.$image['name']);
        $sql_profile = 'INSERT INTO tb_documents(documentType, expiryDate, image, username) VALUES(?, ?, ?, ?)';
        $prepare = $dbh->prepare($sql_profile);
        $prepare->bindValue(1, $type, PDO::PARAM_STR);
        $prepare->bindValue(2, $date, PDO::PARAM_STR);
        $prepare->bindValue(3, $image['name'], PDO::PARAM_STR);
        $prepare->bindValue(4, $_SESSION['username'], PDO::PARAM_STR);
        $prepare->execute();

        echo '<script>alert("Update your profile and the document successfully");window.location = "volunteerMenu.php";</script>';
      }
    }
  }
  else
  {
    echo '<script>alert("Update your profile successfully");window.location = "volunteerMenu.php";</script>';
  }
}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

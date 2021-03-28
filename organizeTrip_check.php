<?php
session_start();
try
{
  $dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
  $db_user = "root";
  $db_password = "";

  $dbh = new PDO($dsn, $db_user, $db_password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $tripID = $_POST['tripID'];
  $description = $_POST['description'];
  $tripDate = date ('Y-m-d', strtotime($_POST['tripDate']));
  $location = $_POST['location'];
  $numVolunteers = $_POST['numVolunteers'];
  $crisisType = $_POST['crisisType'];


  $tripID = htmlspecialchars($tripID, ENT_QUOTES, 'UTF-8');
  $description = htmlspecialchars($description, ENT_QUOTES, 'UTF-8');
  $tripDate = htmlspecialchars($tripDate, ENT_QUOTES, 'UTF-8');
  $location = htmlspecialchars($location, ENT_QUOTES, 'UTF-8');

  $numVolunteers = htmlspecialchars($numVolunteers, ENT_QUOTES, 'UTF-8');
  $crisisType = htmlspecialchars($crisisType, ENT_QUOTES, 'UTF-8');

  $sql_profile = 'INSERT INTO tb_trips(tripID, description, tripDate, location, numVolunteers, crisisType) VALUES(?, ?, ?, ?, ?, ?)';
  $prepare = $dbh->prepare($sql_profile);
  $prepare->bindValue(1, $tripID, PDO::PARAM_STR);
  $prepare->bindValue(2, $description, PDO::PARAM_STR);
  $prepare->bindValue(3, $tripDate, PDO::PARAM_STR);
  $prepare->bindValue(4, $location, PDO::PARAM_STR);
  $prepare->bindValue(5, $numVolunteers, PDO::PARAM_STR);
  $prepare->bindValue(6, $crisisType, PDO::PARAM_STR);
  $prepare->execute();

  $dbh = null;

    echo '<script>alert("Organize Trip successfully");window.location = "staffMenu.php";</script>';
    exit();

}
catch (Exception $e)
{
  $error = $e->getMessage();
  print "{$error}";
  exit();
}
?>

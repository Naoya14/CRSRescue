<?php
session_start();

if(isset($_SESSION['username']))

 {
    header("Location:generatemanager.php");
 }

if(isset($_POST['login']))
{
     $user = $_POST['managerusername'];
     $pass = $_POST['managerpass'];

      if($user == $_POST['managerusername'] && $_POST['managerpass'])
         {

          $_SESSION['username']=$user;

         echo '<script type="text/javascript"> window.open("generatemanager.php","_self");</script>';

        }

        else
        {
            echo "invalid UserName or Password";
        }
}
?>

<?php

$username = $_POST["managerusername"];
$password = $_POST["managerpass"];

//1. create connection
$conn = new mysqli("localhost", "root", "", "mehahospital");

//2. check connection

if ($conn -> connect_error){

  die("Connection failed:" . $conn -> connect_error);
}

echo "connected successfully to DB server";

//3. prepare query and execute

$sql = "INSERT INTO manager (username, password) values('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo " and manager is added";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn -> close();

?>

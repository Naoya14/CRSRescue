<?php
  
  $username = $_POST['username'];
  $password =  $_POST['password'];

// 1. DB Server connection
  $con = mysqli_connect('localhost', 'root', '', 'crsrescue_db');
// check the connection
if($con->connect_error)
    die(" DB Connection failed " . $con->connect_error);

//Check existing user
$query ="SELECT * FROM tb_volunteers WHERE username='$username' AND password='$password';";
$result = mysqli_query($con,$query);
 // login successfully
 if(mysqli_num_rows($result)>0){
  echo '<script>alert("Login successful");window.location = "volunteerMenu.php";</script>';

}else{
  // Insert the values into database table users
  echo '<script>alert("Username or password does not match");window.location = "index.php";</script>';
}

// Close DB connection
$con->close();

?>

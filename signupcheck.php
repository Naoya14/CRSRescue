<?php

if(isset($_POST['signup'])){
  // form handling
  $username = $_POST['username'];
  $password =  $_POST['password'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $conntry = $_POST['country'];
  $gender = $_POST['gender'];
}

// 1. DB Server connection
  $con = mysqli_connect('localhost', 'root', '', 'crsrescue_db');
// check the connection
if($con->connect_error)
    die(" DB Connection failed " . $con->connect_error);

//Check existing user
$query ="SELECT * FROM tb_volunteers WHERE username ='$username';";
$result = mysqli_query($con,$query);
 if(mysqli_num_rows($result)>0){
     echo '<script>alert("Userename already exist.");window.location = "signup.php";</script>';

}else{
  // Insert the values into database table users
  $sqlQuery = "INSERT INTO tb_volunteers VALUES ( '$username', '$password','$name','$phone', '$gender', '$country')";

  // Execute the query
  if ($con->query($sqlQuery) == TRUE ) {
    echo '<script>alert("Sign up successful");window.location = "index.php";</script>';
  }
  else {
    echo "<script>alert('sign up failed');</script>";
  }

}

// Close DB connection
$con->close();

?>

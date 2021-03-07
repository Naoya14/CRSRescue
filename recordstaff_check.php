<?php

  $username = $_POST['username'];
  $password =  $_POST['password'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $position = $_POST['position'];
  $dateJoin = $_POST['dateJoin'];


// 1. DB Server connection
  $con = mysqli_connect('localhost', 'root', '', 'crsrescue_db');
// check the connection
if($con->connect_error)
    die(" DB Connection failed " . $con->connect_error);

//Check existing user
$query ="SELECT * FROM tb_staffs WHERE username='$username';";
$result = mysqli_query($con,$query);
 if(mysqli_num_rows($result)>0){
     echo '<script>alert("Userename already exist.");window.location = "signup.php";</script>';

}else{
  // Insert the values into database table users
  $sqlQuery = "INSERT INTO tb_staffs VALUES ( '$username', '$password','$name','$phone', '$postion', '$dateJoin')";

  // Execute the query
  if ($con->query($sqlQuery) == TRUE ) {
    echo '<script>alert("Record successful");window.location = "index.php";</script>';
  }
  else {
    echo "<script>alert('Record failed');</script>";
  }

}

// Close DB connection
$con->close();

?>

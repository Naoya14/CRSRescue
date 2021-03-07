<?php

if(isset($_POST['login'])){
  // form handling
  $username = $_POST['usernametype'];
  $password =  $_POST['passwordtype'];
  $email = $_POST['emailtype'];
  $fullname = $_POST['fullnametype'];
  $usertypes = $_POST['usertype'];
}

// 1. DB Server connection
  $con = mysqli_connect('localhost', 'root', '', 'mehahospital');
// check the connection
if($con->connect_error)
    die(" DB Connection failed " . $con->connect_error);

//Check existing user
$query ="SELECT * FROM signupuser WHERE username='$username';";
$result = mysqli_query($con,$query);
 if(mysqli_num_rows($result)>0){
     echo '<script>alert("Userename already exist.");window.location = "index.php";</script>';

}else{
  // Insert the values into database table users
  $sqlQuery = "INSERT INTO signupuser VALUES ( '$username', '$password','$email','$fullname', '$usertypes')";

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

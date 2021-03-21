<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true)
{
  setcookie(session_name(), '', time()-42000, '/');
  echo '<script>alert("Sign out successfully");window.location = "index.php";</script>';
}
session_destroy();
?>
<?php

  $conn = mysqli_connect("localhost", "root", "", "crsrescue_db");

  // insert
  if (isset($_POST['login'])) {
    $testerusername = $_POST['username'];
    $testerpass = $_POST['password'];
    $testername = $_POST['name'];
    $testcentre = $_POST['phone'];

    //generate MaterialID
    $SQLlast = "SELECT testerID from recordtester order by testerID desc limit 1;";
    $lastResult = mysqli_query($conn, $SQLlast);
    if (mysqli_num_rows($lastResult) == 0) {
      $id = "T1";
    }
    else {
      $lastRow = $lastResult->fetch_assoc();
      $num = ltrim((string)$lastRow['testerID'], 'T');
      $num = (int)$num + 1;
      $id = 'T'.$num;
    }
    $sql = "INSERT into recordtester values ('$id','$testerusername','$testerpass', '$testername', '$testcentre');";
    $result = mysqli_query($conn, $sql);

  }

  //back to main page
  header('location: recordtester.php');
?>

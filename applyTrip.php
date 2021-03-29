<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['v_login']) == false)
{
  echo '<script>alert("You have not login yet");window.location = "index.php";</script>';
  exit();
}

$dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
$db_user = "root";
$db_password = "";

$dbh = new PDO($dsn, $db_user, $db_password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT tb_trips.tripID, description, tripDate, location, numVolunteers, crisisType, username, count(tb_trips.tripID) AS count 
FROM tb_trips LEFT JOIN tb_applications ON tb_trips.tripID=tb_applications.tripID GROUP BY tb_trips.tripID
HAVING numVolunteers > count';
$prepare = $dbh->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

$bdh = null;

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Volunteer Menu</title>
  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />

  <!-- Font Awesome icons (free version)-->
  <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>

  <!-- Google fonts-->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic"
    rel="stylesheet" type="text/css" />

  <!-- Third party plugin CSS-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/styles.css" rel="stylesheet" />
  <link href="css/simple-sidebar.css" rel="stylesheet">

</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Volunteer</div>
      <div class="list-group list-group-flush">
        <a href="volunteerMenu.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="manageProfile.php" class="list-group-item list-group-item-action bg-light">Manage Profile</a>
        <a href="applyTrip.php" class="list-group-item list-group-item-action bg-light">Apply for Trip</a>
        <a href="applicationStatus.php" class="list-group-item list-group-item-action bg-light">Application Status</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle">Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">

            <li class="nav-item">
              <a class="nav-link" href="signout.php">Sign out</a>
            </li>
          </ul>
        </div>
      </nav>

      <div class="container-fluid">
        <h3 class="m-4">Apply Trip</h3>
        <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">ID</th>
              <th scope="col">Description</th>
              <th scope="col">Trip Date</th>
              <th scope="col">Location</th>
              <th scope="col">Number</th>
              <th scope="col">Crisis Type</th>
              <th scope="col">Form</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($result as $trip): ?>
            <tr>
              <td><?php echo $trip['tripID']; ?></td>
              <td><?php echo $trip['description']; ?></td>
              <td><?php echo $trip['tripDate']; ?></td>
              <td><?php echo $trip['location']; ?></td>
              <td><?php echo $trip['numVolunteers']; ?></td>
              <td><?php echo $trip['crisisType']; ?></td>
              <td>
                <button class="btn btn-outline-primary btn-sm" onclick="location.href='apply_trip_check.php?id=<?=$trip['tripID'];?>&username=<?=$trip['username'];?>'">Apply</button>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JS-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Third party plugin JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>

  <!-- Bootstrap Date-Picker Plugin -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function (e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

  <script>
      $(document).ready(function(){
        var date_input=$('input[name="date"]'); //our date input has the name "date"
        var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
        var options={
          format: 'mm/dd/yyyy',
          container: container,
          todayHighlight: true,
          autoclose: true,
        };
        date_input.datepicker(options);
      });
  </script>

</body>
</html>

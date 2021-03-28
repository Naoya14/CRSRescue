<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['s_login']) == false)
{
  echo '<script>alert("You have not login yet");window.location = "index.php";</script>';
  exit();
}

$dsn = 'mysql:dbname=crsrescue_db;host=localhost;charset=utf8';
$db_user = "root";
$db_password = "";

$dbh = new PDO($dsn, $db_user, $db_password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = 'SELECT * FROM tb_applications';
$prepare = $dbh->prepare($sql);
$prepare->execute();
$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

$bdh = null;

?>
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Admin Menu</title>
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
      <div class="sidebar-heading">Admin</div>
      <div class="list-group list-group-flush">
        <a href="staffMenu.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="organizeTrip.php" class="list-group-item list-group-item-action bg-light">Organize Trip</a>
        <a href="manageApplication.php" class="list-group-item list-group-item-action bg-light"> Manage Application</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-success" id="menu-toggle">Menu</button>

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
        <h3 class="m-4">Manage Application</h3>
        <div class="container">
        <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">applicationID</th>
              <th scope="col">Application Date</th>
              <th scope="col">Status</th>
              <th scope="col">Remark</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($result as $trip): ?>
            <tr>
              <td><?php echo $trip['applicationID']; ?></td>
              <td><?php echo $trip['applicationDate']; ?></td>
              <td><?php echo $trip['status']; ?></td>
              <td><?php echo $trip['remark']; ?></td>
            </tr>

            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="form-group row">
          <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select  name= "status" id="inputStatus" class="form-control">
              <option selected>Choose...</option>
              <option>Accepted</option>
              <option>Rejected</option>
            </select>
          </div>
        </div>

        <div class="form-group row">
          <label for="inputRemark" class="col-sm-2 col-form-label">Remark</label>
          <div class="col-sm-10">
            <input type="text" name="remark" class="form-control" id="inputRemark" placeholder="remark">
          </div>
        </div>

        <div class="form-group row">
          <div class="col-sm-10">
            <button class="btn btn-success mt-3" type="submit">Updated</button>
          </div>
        </div>



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

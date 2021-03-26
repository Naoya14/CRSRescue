<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['m_login']) == false)
{
  echo '<script>alert("You have not login yet");window.location = "index.php";</script>';
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Manager Menu</title>
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
      <div class="sidebar-heading">Manager</div>
      <div class="list-group list-group-flush">
        <a href="managerMenu.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="recordStaff.php" class="list-group-item list-group-item-action bg-light">Record CRS Staff</a>
        \
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-dark" id="menu-toggle">Menu</button>

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
        <form class="m-3">
        <h3 class="mt-4 mb-4">Record CRSrescue Staff</h3>
          <div class="form-group row">
            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" pattern=".{}|.{8,}">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPhone" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input type="text" name="phone" class="form-control" id="inputPhone" placeholder="Phone" pattern=".{} | ^\d{3}-\d{3}-\d{4}$">
            </div>
          </div>

          <div class="form-group row">
            <label for="position" class="col-sm-2 col-form-label">Position</label>
            <div class="col-sm-10">
              <select id="inputType" class="form-control">
                <option selected>Choose...</option>
                <option>Manager</option>
                <option>Admin</option>
              </select>
            </div>
          </div>
          <div class="form-group row">
             <label class="col-sm-2 col-form-label" for="date">Date</label>
             <div class="col-sm-10">
              <input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"/>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button class="btn btn-dark mt-3" type="submit">Record</button>
            </div>
          </div>
        </form>
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

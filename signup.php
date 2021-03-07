<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">

  <!-- boostrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
    integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/1ba7b41d28.js" crossorigin="anonymous"></script>

  <!-- google font -->
  <link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">

  <!-- style sheet -->
  <link rel="stylesheet" href="css/styles.css">

  <!-- jquery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <title>Welcome to CRS</title>

</head>

<body class="crs">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top opacity-2">

      <div class="container">
        <a class="navbar-brand" href="index.php">
          <i class="fas fa-hands-helping"></i> CRS
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbar">

          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="volunteerLogin.php">VolunteerLogin</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="staffLogin.php">StaffLogin</a>
            </li>
          </ul>

        </div>
      </div>
    </nav>
  </header>

  <section>
    <div class="container margin-top">
      <h2>Sign up</h2>

      <form method="post" class="form" name="signup" action="signupcheck.php">
        <div class="form-group mt-3">
          <label for="username">Username</label>
          <input type="text" name="username" class="form-control" id="username" aria-describedby="username"
            placeholder="Enter username">
        </div>

        <div class="form-group mt-3">
          <label for="password">Password</label>
          <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
        </div>

        <div class="form-group mt-3">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
            placeholder="Enter name">
        </div>

        <div class="form-group mt-3">
          <label for="phone">Phone</label>
          <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="phone"
            placeholder="Enter phone number">
        </div>

        <div class="form-group mt-3">
          <label for="phone">Country</label>
          <input type="text" name="country" class="form-control" id="country" aria-describedby="country"
            placeholder="Enter country">
        </div>

        <div class="form-group mt-3">
          <label for="Gender">Gender</label>
          <br>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male">
            <label class="form-check-label" for="inlineRadio1">Male</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female">
            <label class="form-check-label" for="inlineRadio2">Female</label>
          </div>
        </div>
        <input type="button" value="signup" class="btn btn-danger mt-4" onClick="signupcheck()"></input>

      </form>
    </div>
  </section>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
  <script type="text/javascript" src="js/script.js"></script>

</body>

</html>

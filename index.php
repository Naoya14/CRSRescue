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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

      <div class="container">
        <a class="navbar-brand" href="index.html">
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

  <section class="landing">
    <div class="dark-over">
      <div class="landing-inner">
        <h1 class="x-large">CRS-Rescue</h1>
        <p class="lead">Our mission is help the people who get affected communities natural disaster </p>
        <div>
          <a href="signup.php" class="btn btn-large btn-danger  ">Sign Up</a>
        </div>
      </div>
    </div>
  </section>

  <section class="introduction">
    <div class="header">
      <h1 class="large">What is CRS Rescue?</h1>
      <p>
        Our motto is to try and stay passionate, we will try to solve the challenges that exist
        in terms of real help for people who need support and provide our volunteers with real experience.
      </p>
    </div>

    <div class="vision">
      <img src="img/vision.png" alt="vision">
      <h2 class="title">Vision</h2>
      <p>A community that is directly involved in helping and providing good service
      </p>
    </div>
    <div class="mission">
      <img src="img/mission.png" alt="mission">
      <h2 class="title">Mission</a></h2>
      <p>
        We advance this voluntary institution
        by strengthening leadership, cohesiveness, the latest innovations and empowering individuals as volunteers.
      </p>
    </div>

  </section>

  <section class="contact-crs">
    <h2 class="text-contact">Get In Touch</h2>
    <h3 class="text-contact">If you have any questions, please don't hesitate and contact us.</h3>
    <a class="btn btn-danger" href="#">CONTACT US</a>
  </section>

  <section class="footer">
    <p class="copyright">&copy; <span class="copyright-year"></span> CRS</p>
  </section>


  <script>
    var date = new Date();
    $(".copyright-year").text(date.getFullYear());
  </script>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
    integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
    integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>
</body>

</html>

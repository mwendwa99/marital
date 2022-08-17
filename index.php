<?php
// session_start();
//This file creates the User interface for the administrator's dashboard
//It displays all the data fetched from the database. 
include('controllers/connect.php');
$all = $connection->query("SELECT * from cases");
$allcases = mysqli_num_rows($all);
$active = $connection->query("SELECT * from cases where cur_status = 'Active'");
$activecases = mysqli_num_rows($active);
$resolved = $connection->query("SELECT * from cases where cur_status = 'Resolved'");
$resolvedcases = mysqli_num_rows($resolved);



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>MyPlan</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/ribbon.png" rel="icon">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Dosis:300,400,500,,600,700,700i|Lato:300,300i,400,400i,700,700i" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">


  <link href="css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="#header" class="logo nav-link scrollto">MyPlan</a>


      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="./user/login.php">User Login</a></li>
          <li><a class="nav-link scrollto" href="login.php">Admin Login</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Do not Suffer in Silence</h1>
          <h2>Eliminate Domestic Violence. Promote Women in Society</h2>
          <div><a href="#contact" class="btn-get-started scrollto">Report Incident</a></div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="assets/img/hero-img.png" class="img-fluid" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Report An Incident</h2>
          <p>Enter Details Below to report anonymously</p>
          <sub>Login as user to report an identified incident
            <a href="./user/login.php" class="btn-get-started scrollto">here</a>
          </sub>
        </div>



        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>A108 Muscart</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@myplan.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+447 0077 55488 55</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="controllers/save_incident.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                  <input type="hidden" name="user_id" value="0">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">

                </div>
              </div>
              <div class="form-group mt-3">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone No" required>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="address" id="address" placeholder="Address" required>
              </div>
              <div class="form-group mt-3">
                <select class="form-select" name="category" aria-label="Default select example">
                  <option selected>----Select Incident Category -----</option>
                  <option value="1">Domestic Violence</option>
                  <option value="2">Child Abuse</option>

                </select>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>

              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Action will be taken ASAP. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->


    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="text-center title">
          <h3>What we have achieved so far</h3>
          <p>We take reported incidents seriously and we work closely with the authorities to help the victims.</p>
        </div>

        <div class="row counters position-relative">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo number_format($allcases) ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Total Incidents</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo number_format($resolvedcases) ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Resolved Incidences</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo number_format($activecases) ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>Unresolved</p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end=<?php echo number_format($allcases) ?> data-purecounter-duration="1" class="purecounter"></span>
            <p>New Incidences</p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">





    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>MyPlan</span></strong>. All Rights Reserved
      </div>

    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../login.css">

</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <!-- Tabs Titles -->
      <h2 class="active"> MyPlan USER LOGIN </h2>
      <?php
      if (isset($_GET['error'])) {
      ?>
        <div style="background: pink;  padding: 20px">
          <strong>Error!</strong> <?php echo $_GET['error']; ?>
        </div>
      <?php
      } else if (isset($_GET['success'])) {

      ?>
        <div style="background: lightgreen; padding: 20px">
          <strong>Success!</strong> <?php echo $_GET['success']; ?>
        </div>
      <?php
      }
      ?>

      <!-- Login Form -->
      <form method="POST" action="../controllers/process-user-signin.php">

        <input type="email" id="login" class="fadeIn second" name="email" placeholder="Email" required>

        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>

        <input type="submit" class="fadeIn fourth" value="Log In">

      </form>
      <p>Don't have an account? <br /> <a href="signup.php">sign-up</a></p>

      <!-- Remind Passowrd -->
      <div id="formFooter">

      </div>

    </div>
  </div>
  <!-- partial -->





</body>

</html>
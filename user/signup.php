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
      <h2 class="active"> MyPlan USER SIGN UP</h2>

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
      <form method="POST" action="../controllers/process-user-signup.php">

        <input type="text" id="login" class="fadeIn second" name="fname" placeholder="First Name" required>

        <input type="text" id="login" class="fadeIn second" name="lname" placeholder="Last Name" required>

        <input type="email" id="login" class="fadeIn second" name="email" class="email-area" placeholder="Email" required>

        <input type="tel" id="login" class="fadeIn second" name="pno" placeholder="phone number" minlength="9" maxlength="10" required>

        <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>

        <input type="password" id="password" class="fadeIn third" name="re_password" placeholder="confirm password" required>

        <input type="submit" class="fadeIn fourth" value="Log In">
      </form>
      <a href="login.php">sign up</a>
      <!-- Remind Passowrd -->
      <div id="formFooter">

      </div>

    </div>
  </div>
  <!-- partial -->





</body>

</html>
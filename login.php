<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="login.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> MyPlan ADMIN LOGIN </h2>

    <!-- Login Form -->
    <form method="POST" action="./controllers/processlogin.php">
                            
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="Email" required>
     
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password"  required>
     
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      
    </div>

  </div>
</div>
<!-- partial -->
  




</body>
</html>


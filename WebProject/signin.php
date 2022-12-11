<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign In</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/065492fc44.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/styles.css">

  </head>

  <body>
    <section>
      <div class="image">
        <img src="R.jpg">
      </div>
      <div class="sign-up">
        <div class="sign-up-form">
          <h2>Sign In</h2>

          <form action="../scripts/signin.php" method="post">
            <div class="input">
              <span>Username</span>
              <input type="text" name="username" value="">
            </div>
            <div class="input">
              <span>Password</span>
              <input type="password" id="password" name="password" value="">
              <i class="far fa-eye"  id="togglePassword"></i>

            </div>
            
            <div class="input">
              <input type="submit" id="submit" name="signin" value="Sign in">
            </div>
            <div class="input">
              <?php 
              echo '<p>Don\'t have an account? <a href="http://localhost/phase2-mongo/WebProject/signup.php">Sign Up</a> or go to <a href="http://localhost/phase2-mongo/HomePage/index.php">Home Page</a></p>'
              ?>
            </div>
          </form>

        </div>

      </div>
    </section>


    <script src="script.js" type="text/javascript"></script>

  </body>
</html>

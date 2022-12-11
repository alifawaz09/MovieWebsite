



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
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
          <h2>Sign Up</h2>

          <form action="../scripts/signup.php" method="POST">
            <div class="input">
              <span>Username</span>
              <span style="display: inline-block; margin-bottom: 10px;font-size:10px;color:red;" id="cautionUser"></span>
              <input type="text" id="username" name="username" value="">
            </div>
            <div class="input">
              <span>Email Address</span>
              <span style="display: inline-block; margin-bottom: 10px;font-size:10px;color:red;" id="cautionEmail"></span>
              <input type="email" id="email" name="email" value="">
            </div>
            <div class="input">
              <span>Phone Number</span>
              <span style="display: inline-block; margin-bottom: 10px;font-size:10px;color:red;" id="cautionEmail"></span>
              <input type="text" id="phoneNumber" name="phoneNumber" value="">
            </div>
            <div class="input">
              <span>Password</span>
              <span style="font-size:10px;color:red;" id="caution"></span>
              <input type="password" id = "password" name="password" value="">
              <i class="far fa-eye"  id="togglePassword"></i>
            </div>
            <div class="input">
              <span>Confirm Password</span>
              <span style="font-size:10px; color:red;" id="caution2"></span>
              <input type="password" id="password2" name="password2" value="">
              <i class="far fa-eye"  id="togglePassword2"></i>
            </div>

            <div class="input">
              <input type="submit" id="submit" name="save_user" value="Sign Up">
            </div>
            <div class="input">
            <?php 
              echo '<p>Don\'t have an account? <a href="http://localhost/phase2-mongo/WebProject/signin.php">Sign in</a></p>'
              ?>
          </div>
          </form>



        </div>

      </div>
    </section>


    <script src="script.js" type="text/javascript"></script>

  </body>
</html>

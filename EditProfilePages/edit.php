<?php require "../isAuthenticated.php" ?>
<?php require "../dbcon.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://kit.fontawesome.com/065492fc44.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="styles.css">

  <title>Document</title>
</head>
<body>
  <div class="header">

    <div class="container">



      <?php include("../navbar.php"); ?>

    </div>

  <div class="content">
      <div class="title">
        <h1>Edit Profile</h1>

      </div>

    <div class="profile-picture">
      <a href="#"><img src="https://s.ltrbxd.com/static/img/avatar220.1dea069d.png" alt=""></a>
    </div>

    <?php 
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $query = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($_SESSION['id'])]);

        
      ?>
    <form class="form" action="../scripts/editProfile.php" method="POST">

      <div class="details">
        <div class="input_title">
          <h4>Username</h4>

          <a href="#" onclick='enable("username")'><i class="fa fa-edit"></i></a>
        </div>
        <input type="text" class="form__input" id="username" name="username"  value="<?=$query['username'] ?>"  readonly/>
      </div>
      <input type="hidden" name="id" value="<?=$_SESSION['id']?>">


      <div class="details">
        <div class="input_title">
          <h4>Email</h4>

          <a href="#" onclick='enable("email")'><i class="fa fa-edit"></i></a>

        </div>
        <input type="text" class="form__input" id="email" name="email" value="<?=$query['email'] ?>" readonly/>
      </div>




      <div class="details">
        <div class="input_title">
          <h4>Password</h4>

          <a href="#" onclick='enable("password")'><i class="fa fa-edit"></i></a>

        </div>
        <input type="password" class="form__input" id="password" name="password"  readonly/>
        <i class="far fa-eye"  id="togglePassword"></i>

      </div>

      <div class="details">
        <div class="input_title">
          <h4>About me</h4>
          <a href="#" onclick='enable("aboutme")'><i class="fa fa-edit"></i></a>

        </div>
        <input type="text" class="form__input" id="aboutme" name="aboutme" value="<?=$query['aboutme'] ?>"  readonly/>

      </div>

      <button type="submit" class="button" name="edit" value="Edit">Submit</button>
    </form>
  </div>
</div>


<footer class = "footer">
    <p class = "footertitle">CopyRights @ <span>MyMovies</span>  </p>

    <div class="footerinfo">
      <a href="#">About us</a>
    </div>




  </footer>






<script src="script.js">
</script>
</body>

</html>

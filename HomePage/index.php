<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Document</title>
</head>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<body>

  <header>
    <a href="#" class="logo">MyMovies</a>

    <nav class="navigation">
      <a href="#">Home</a>
      <a href="http://localhost/phase2-mongo/MoviesPage/movies.php">Movies</a>
      <a href="http://localhost/phase2-mongo/Forum/forum.php?id=<?=1?>">Forum</a>
      <?php
        echo '<a href="http://localhost/phase2-mongo/WebProject/signin.php">Sign in
        </a>'
      ?>
      
      <?php
        echo '<a href="http://localhost/phase2-mongo/WebProject/signup.php">Sign Up
        </a>'
      ?>
    </nav>
  </header>


  <section class = "main">
    <div>
      <h1>Welcome to MyMovies</h1>
      <h4>Where you'll enhance your movie experience and knowledge</h4>

      <a href="#services" class="main-button">What you can do</a>
    </div>

  </section>


  <section class="services" id="services">
    <h2 class="title">Services</h2>

    <div class="content">

      <div class="card">
        <div class="icon">
          <i class="fa fa-info" aria-hidden="true"></i>
        </div>
        <div class="description">
          <h3>Details</h3>
          <p>You can get any movie details</p>
        </div>

      </div>

      <div class="card">
        <div class="icon">
          <i class="fa fa-search" aria-hidden="true"></i>
        </div>
        <div class="description">
          <h3>Browse</h3>
          <p>You can browse any movie you want</p>
        </div>

      </div>
      <div class="card">
        <div class="icon">
          <i class="fa fa-star" aria-hidden="true"></i>
        </div>
        <div class="description">
          <h3>Favorite</h3>
          <p>You can add any movie to your favorites</p>
        </div>

      </div>
      <div class="card">
        <div class="icon">
          <i class="fa fa-comment" aria-hidden="true"></i>
        </div>
        <div class="description">
          <h3>Comment</h3>
          <p>You can add comments and share your opinion</p>
        </div>

      </div>

    </div>

  </section>

  <footer class = "footer">
    <p class = "footertitle">CopyRights @ <span>MyMovies</span></p>

    <div class="footer-items">
      <a href="#">About us</a>
    </div>
  </footer>



</body>
</html>

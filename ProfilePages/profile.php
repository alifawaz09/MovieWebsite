<?php require "../isAuthenticated.php" ?>
<?php require "../dbcon.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles.css">

  <title>Document</title>
</head>
<body>

  <header>

    <div class="container">
    <?php include("../navbar.php"); ?>

    </div>






  <div class="content-body">

    <div class="profile-info">

      <div class="profile-picture">
        <a href="#"><img src="https://s.ltrbxd.com/static/img/avatar220.1dea069d.png" alt=""></a>
      </div>

      <div class="name-button">
      <?php 
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];

        $query = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($_SESSION['id'])]);
        $favorites = [];
        $favorites = (Array)$query['favorites'];
        $favorite_length = count($favorites);

        $comments = $comment->find(['ownerid' =>new \MongoDB\BSON\ObjectID($_SESSION['id'])], []);
        $comments_count = 0;
        foreach($comments as $c){
          $comments_count++;
        }
        



        
      ?>

        <h3><?=$query['username']?></h3>

        <form  action="http://localhost/phase2-mongo/EditProfilePages/edit.php" method="post">
          <button type="submit" class="button" name="button">Edit profile</button>
        </form>
      </div>
      </div>


      <div class="profile-activity">
        <div class="activity-title">
          <h3>Activity: </h3>

        </div>
        <p class = "activity-p" > <span id="favorites"> <?=$favorite_length?></span> <span class="br-span"> Favorites </span></p>
        <p  class = "activity-p"><?=$comments_count?> <span class="br-span">Comments </span></p>

      </div>
    </div>

    <section class="bio-section">
      <h2>About me</h2>
      <p><?=$query['aboutme'] ?></p>
    </section>

        <?php
        

      ?>

        


    <section class="movie-section">

      <h2>Favorite Films</h2>

      <div class="card-container">


            <?php
            foreach($favorites as $fav){
              $movie = $movies->findOne(['id' => $fav]);

            ?>
            <?php if(strlen($movie['poster_path']) < 60){
            ?>
          <div class="cards" id="cards">

          <div class="image">

               <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$movie["id"]?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Blank_square.svg/2048px-Blank_square.svg.png" alt="idk"></a>
               </div>
               </div>

         <?php } 
         
         else{ ?>
                 <div class="cards" id="cards">

            <div class="image">

            <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$movie["id"]?>"><img src="<?=$movie['poster_path']?>" alt="idk"></a>
            </div>

            </div>

            <?php } } ?>
          </div>

          </div>

      </section>

</header>



  <footer class = "footer">
        <p class = "footertitle">CopyRights @ <span>MyMovies</span>  </p>

        <div class="footerinfo">
          <a href="#">About us</a>
        </div>

      </footer>


      
</body>
</html>

<?php 
      require "../dbcon.php";
      require "../api.php";
      session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="styles.css">

  <title>Document</title>
</head>
<body>

  <header>

    <div class="container">
    
    <?php include("../navbar.php"); ?>
    </div>

    <?php
    
    $movie_id = $_GET['id'];
    $movie = $movies->findOne(['id' => $movie_id]);
    $genre = $movie['genres'];
    $genre_array = getGenre($genre);

    $companies = $movie['production_companies'];
    $companies_array = getCompanies($companies);
    

    $favorites = [];
    print_r($_SESSION['id']);
    $current_user = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($_SESSION['id'])]);
    $favorites = (Array)$current_user['favorites'];
   



    ?>


  <div class="card">
    <h2>Movie Details</h2>

    <div class="card-container">

      <div class="cards">
        <div class="card-img">
        <?php if(strlen($movie['poster_path']) < 60){
            ?>

               <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$movie["id"]?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Blank_square.svg/2048px-Blank_square.svg.png" alt="idk"></a>
         <?php } 
         
         else{ ?>
          
               <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$movie["id"]?>"><img src="<?=$movie['poster_path']?>" alt="idk"></a>
        <?php } ?>
          <a href="http://localhost/phase2-mongo/Forum/forum.php?id=<?=$movie_id?>"><button>Forum</button></a>
          <?php  if(in_array($movie_id, $favorites) == FALSE){
            ?>
    
          <form action="../scripts/favorites.php" method="POST">
            <input type="hidden" value="<?=$movie_id?>" name="movie_id">
            <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
            <Button type="submit" name="favorite">Add to favorites</Button>
          </form>
          <?php }
          else{
            ?>

        <form action="../scripts/favorites.php" method="POST">
              <input type="hidden" value="<?=$movie_id?>" name="movie_id">
              <input type="hidden" value="<?=$_SESSION['id']?>" name="id">
              <Button type="submit" name="remove_favorite">Remove from favorites</Button>
            </form>
        <?php
          }
          ?>

        </div>
        <div class="card-details">
          <h1><?=$movie['original_title']?></h1>
          <div class="summary">
            <p><?=$movie['overview']?></p>
          </div>

            <br>
            <p>Country:
              <?=substr($movie['production_countries'], 31, -3)?>
              <br>
              Genres:
              <?php foreach($genre_array as $g){
                echo $g." ";
              } ?>
              
              <br>
              Release: <?=$movie['release_date']?>
              <br>
              Production: <?php foreach($companies_array as $g){
                echo $g." ";
              } ?>
              <br>
              Popularity: <?=$movie['popularity']?>
              </p>
        </div>
      </div>
    </div>
  </div>

</header>



  <footer class = "footer">
        <p class = "footertitle">CopyRights @ <span>MyMovies</span>  </p>

        <div class="footerinfo">
          <a href="#">About us</a>
        </div>

      </footer>


</body>
</html>


<?php 
require '../dbcon.php';

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>



  <header>
    <?php include("../navbar.php"); ?>
  </header>


  <section class="main">

    <div class="menu">

      <p>Browse by</p>
      <form method="POST">
      <div class="input-group rounded">
        <input type="search" name="searchBar" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="submit" name="search"><span class="input-group-text border-0" id="search-addon">Submit</button>
        <i class="fas fa-search"></i>
      </form>
      
</div>
      </div>



     

     

    </div>
 

    <div class="movies">

    <?php
      
      if(isset($_POST['search'])){
        $movie_name = $_POST['searchBar'];
        $result = $movies->find(['original_title' => $movie_name]);
      }
      else{
        $result = $movies->find([], ['limit' => 20]);

      }



?>
      <?php 
        foreach($result as $res){?>
          <div class="movie-card" id="movie-card">

          <?php if(strlen($res['poster_path']) < 60){
            ?>

            <div class="image">
               <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$res["id"]?>"><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/1f/Blank_square.svg/2048px-Blank_square.svg.png" alt="idk"></a>
            </div>
         <?php } 
         
         else{ ?>
          
          <div class="image">
               <a href="http://localhost/phase2-mongo/MoviesDetails/index.php?id=<?=$res["id"]?>"><img src="<?=$res['poster_path']?>" alt="idk"></a>
            </div>
        <?php } ?>

           
            <h3 style="color:orange;"><?=$res['original_title'] ?></h3>
          </div>

        <?php 
        }
        ?>

        

    </div>

    

    <footer class="footer">
      <p class="footertitle">CopyRights @ <span>MyMovies</span> </p>
      <div class="footerinfo">
        <a href="#">About us</a>
      </div>
    </footer>

  </section>



</body>

</html>

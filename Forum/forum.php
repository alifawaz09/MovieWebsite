<?php require "../dbcon.php" ?>
<?php require "../isAuthenticated.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">


  
  <title>Document</title>
</head>
<body>

  <header>
    
  <div class="container-fluid">
    <?php include("../navbar.php"); ?>

    </div>
    <div class="content">
      <div class="title">
        <h1>Forum</h1>
      </div>


      <div class="comments">

      <?php 
      try{
        $forum_id = $_GET['id'];
      }
      catch(Exeption $e){
        $forum_id = 1;
      }
      
      $current_user = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($_SESSION['id'])]);
      
      $query = $comment->find(['movieId' => $forum_id], []);

      foreach($query as $comment){
        $id = $comment['ownerid'];
        $owner = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);
        if(strcmp($owner['username'], $current_user['username']) == 0){?>
        <div class="comment" id="comment">
          <div class="profile-picture">
            <img src="https://s.ltrbxd.com/static/img/avatar220.1dea069d.png" alt="">

          </div>

            <div class="comment-username">
              <h3><?=$owner['username']?></h3>

            </div>
            
            <div class="comment-text">
              <p><?=$comment['text']?></p>
            </div>

            <div class="button-container">
              <form action="../scripts/comments.php" method="POST">
                  <input type="hidden" name="forum_id" value="<?=$forum_id?>">
                  <button class="btn btn-danger btn-sm" type="submit" name="delete_comment" value="<?=$comment['_id']?>">Delete</button>
              </form>
              <a href="http://localhost/phase2-mongo/Forum/editComment.php?id=<?=$comment['_id']?>"><button class="btn btn-success btn-sm">Edit</button></a>


            </div>

        </div>
      <?php
        }

        else{?>
        <div class="comment" id="comment">
          <div class="profile-picture">
            <img src="https://s.ltrbxd.com/static/img/avatar220.1dea069d.png" alt="">

          </div>

            <div class="comment-username">
              <h3><?=$owner['username']?></h3>

            </div>
            
            <div class="comment-text">
              <p><?=$comment['text']?></p>
            </div>

            

        </div>
      <?php
        }
        ?>
        

        <?php 

      }
      
      ?>
      </div>


      
      <form class="form" action="../scripts/comments.php" method="post">
      <input type="hidden" name="id" value="<?=$_SESSION['id']?>">

        <div class="textArea">
        <input type="hidden" name="forum_id" value="<?=$forum_id?>">
          <textarea name="comment" id="comment" rows="5" cols="150" placeholder="Add a comment"></textarea>
          <button class="add-button" type="submit" name="addcomment" id="addcomment">Add a comment</button>
        </div>
      </form>


      
      </div>
    </div>
  </header>

  <footer class = "footer">
      <p class = "footertitle">CopyRights @ <span>MyMovies</span></p>

      <div class="footerinfo">
        <a href="#">About us</a>
      </div>
  </footer>


  </body>
</html>

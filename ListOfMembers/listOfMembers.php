<?php require "../isAuthenticated.php";
require '../dbcon.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>
<body>
  <header>

    <div class="container">
      <ul class="navigation">
        <li><a href="#">Home</a></li>
        <li><a href="#">Movies</a></li>
        <li><a href="#">Forum</a></li>
        <li><span class="logo">MyMovies</span></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Login</a></li>
        <li><a href="#">Register</a></li>
      </ul>
    </div>

    <?php 
    
    $members = $user->find([]);
    
    
    ?>

    <div class="content">
      <div class="title">
        <h1>List of members</h1>
      </div>

      <div class="table" >
        <table id="Table">
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Favorite Genre</th>
          </tr>
      <?php
      foreach($members as $m){
        ?>
      <tr>
        <th><?=$m['_id']?></th>
        <th><?=$m['username']?></th>
        <th><?=$m['email']?></th>
        <th><?=null?></th>

      </tr>

      <?php }
      
      ?>
          </table>
            </div>


      <!-- <script type="text/javascript">
        var table = document.getElementById("Table");
        for(let i = 1; i < 40; i++) {
          var row = table.insertRow(i);
          var cell0 = row.insertCell(0);
          var cell1 = row.insertCell(1);
          var cell2 = row.insertCell(2);
          var cell3 = row.insertCell(3);

          cell0.innerHTML = i;
          cell1.innerHTML = "Dummy";
          cell2.innerHTML = "dummy@hotmail.com";
          cell3.innerHTML = "Fantasy";
        }
      </script> -->
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

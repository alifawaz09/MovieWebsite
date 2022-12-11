
<?php require "../dbcon.php" ?>
<?php require "../isAuthenticated.php" ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
        <?php include("../navbar.php"); ?>
    </div>


    <?php
    $c = $comment->findOne(['_id' => new \MongoDB\BSON\ObjectID($_GET['id'])]);
    
    ?>

    <form action="../scripts/comments.php" method="POST">
        <div  class="textarea">
            <label for="exampleFormControlTextarea1" class="form-label">Edit comment</label>
            <input type="hidden" name="id" value="<?=$_GET['id']?>">
            <textarea class="form-control" id="exampleFormControlTextarea1" name="comment" value="<?=$c['text']?>" rows="3"><?=$c['text']?></textarea>
            <button type="submit" name="edit_comment" class="btn-primary mt-2">Submit</button>
        </div>
    </form>
    

    
</body>
</html>


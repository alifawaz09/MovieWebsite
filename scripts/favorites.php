<?php 

require '../dbcon.php';



if(isset($_POST['favorite'])){
    $movieId = $_POST['movie_id'];
    $id = $_POST['id'];

    $favorites = [];

    $result = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);
    $favorites = (Array)$result['favorites'];

    if(in_array($movieId, $favorites) == FALSE){
        array_push($favorites, $movieId);
        $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
        ['$set' =>
        ['favorites' => $favorites
        ]]);
    }
    
    header('location: ../MoviesDetails/index.php?id='.$movieId);

}



if(isset($_POST['remove_favorite'])){
    $movieId = $_POST['movie_id'];
    $id = $_POST['id'];

    $favorites = [];

    $result = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);
    $favorites = (Array)$result['favorites'];
    unset($favorites[array_search($movieId, $favorites)]);
    $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
        ['$set' =>
        ['favorites' => $favorites
        ]]);
    
    
    header('location: ../MoviesDetails/index.php?id='.$movieId);

}



?>
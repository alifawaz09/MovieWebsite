<?php

require '../dbcon.php';



if(isset($_POST['addcomment'])){
    $text = $_POST['comment'];
    $id = $_POST['id'];
    $forum_id = $_POST['forum_id'];
    $new_comment = [
        'text' => $text,
        'ownerid' => new \MongoDB\BSON\ObjectID($id),
        'movieId' => $forum_id
    ];

    $result = $comment->insertOne($new_comment);
    header('location: ../Forum/forum.php?id='.$forum_id);

}


if(isset($_POST['delete_comment'])){
    $comment_id = $_POST["delete_comment"];
    $forum_id = $_POST['forum_id'];
    $comment->deleteOne(['_id' => new \MongoDB\BSON\ObjectID($comment_id)]);
    header('location: ../Forum/forum.php?id='.$forum_id);

}

if(isset($_POST['edit_comment'])){
    $text = $_POST['comment'];
    $id = $_POST['id'];
    $comment->updateOne(['_id' => new  \MongoDB\BSON\ObjectID($id)],
    ['$set' =>[
        'text' => $text
    ]]);

    $newComment = $comment->findOne(['_id' => new  \MongoDB\BSON\ObjectID($id)]);

    
    header('location: ../Forum/forum.php?id='.$newComment['movieId']);


}



?>
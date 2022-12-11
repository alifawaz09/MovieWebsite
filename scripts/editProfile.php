<?php

require '../dbcon.php';


if(isset($_POST['edit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $aboutme = $_POST['aboutme'];
    $id = $_POST['id'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $query = $user->find(['username' => $username]);
    $query2 = $user->find(['email' => $email]);

    $countUser = 0;
    $countEmail = 0;
    foreach($query as $obj){
        $countUser++;
    }
    foreach($query2 as $obj){
        $countEmail++;
    }


    if($countUser > 0 && $countEmail == 0){
        echo 'hi';

        if(!empty($password)){
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            [
            'email' => $email,
            'password' => $hashed_password,
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;
    
            
        }
        else{
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            [
            'email' => $email,
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;
        }
     
        header('location: ../EditProfilePages/edit.php');



    }
    if($countUser == 0 && $countEmail > 0){
        if(!empty($password)){
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            ['username' => $username,
            'password' => $hashed_password,
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;

    
            
        }
        else{
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            ['username' => $username,
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;

        }
        header('location: ../EditProfilePages/edit.php');

       

    }
    if($countUser == 0 && $countEmail == 0){

        if(!empty($password)){
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            ['username' => $username,
            'email' => $email,
            'password' => $hashed_password,
            'aboutme' => $aboutme
            
            ]]);
            $_SESSION['password'] = $password;

    
        }
        else{
             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            ['username' => $username,
            'email' => $email,
            'aboutme' => $aboutme
            
            ]]);
            $_SESSION['password'] = $password;

        }
        header('location: ../EditProfilePages/edit.php');

       
    }
    if($countUser > 0 && $countEmail > 0){
        echo 'hi';

        if(!empty($password)){
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            [
            'password' => $hashed_password,
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;
    
        }
        else{
            $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
            ['$set' =>
            [
            'aboutme' => $aboutme
            ]]);
            $_SESSION['password'] = $password;
        }
        header('location: ../EditProfilePages/edit.php');
        

    }

   


}

?>
<?php 

require '../dbcon.php';



if(isset($_POST['signin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $user->findOne(['username' => $username]);

    if(strcmp($result['username'], $username)  == 0 && password_verify($password, $result['password'])){
        session_start();
        $_SESSION['auth'] = 'true';
        $_SESSION['id'] = $result['_id'];
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;

        header('location: ../MoviesPage/movies.php');
    }
    else{
        header("Location: ../WebProject/signin.php");
    }

}



?>
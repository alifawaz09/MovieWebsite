<?php

require '../dbcon.php';


if(isset($_POST['save_user'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $new_user = [
        'username' => $username,
        'email' => $email,
        'phonenumber' => $phoneNumber,
        'password' => $hashed_password,
        'favorites' => [],

        'aboutme' => ""
    ];

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

    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
       } else {
        if(strcmp($password, $password2) == 0){
            if($countUser > 0 || $countEmail > 0){
    
                header("Location: ../WebProject/signup.php");
                exit(0);
                
                
                
            }
            else{
                $result = $user->insertOne($new_user);
                $_SESSION['message'] = "Student created successfully";
                header("Location: ../WebProject/signin.php");
                exit(0);
            }
           
        }
        else{
            header("Location: ../WebProject/signup.php");
            exit(0);
        }
       }
    

    

}



?>

<?php


// require 'dbcon.php';

// if(isset($_POST['save_user'])){

//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $phoneNumber = $_POST['phoneNumber'];
//     $password = $_POST['password'];
//     $password2 = $_POST['password2'];
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     $new_user = [
//         'username' => $username,
//         'email' => $email,
//         'phonenumber' => $phoneNumber,
//         'password' => $hashed_password,
//         'favorites' => [],

//         'aboutme' => ""
//     ];

//     $query = $user->find(['username' => $username]);
//     $query2 = $user->find(['email' => $email]);

//     $countUser = 0;
//     $countEmail = 0;
//     foreach($query as $obj){
//         $countUser++;
//     }
//     foreach($query2 as $obj){
//         $countEmail++;
//     }

//     $number = preg_match('@[0-9]@', $password);
//     $uppercase = preg_match('@[A-Z]@', $password);
//     $lowercase = preg_match('@[a-z]@', $password);
//     $specialChars = preg_match('@[^\w]@', $password);
//     if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
//         echo "Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.";
//        } else {
//         if(strcmp($password, $password2) == 0){
//             if($countUser > 0 || $countEmail > 0){
    
//                 header("Location: WebProject/signup.php");
//                 exit(0);
                
                
                
//             }
//             else{
//                 $result = $user->insertOne($new_user);
//                 $_SESSION['message'] = "Student created successfully";
//                 header("Location: WebProject/signin.php");
//                 exit(0);
//             }
           
//         }
//         else{
//             header("Location: WebProject/signup.php");
//             exit(0);
//         }
//        }
    

    

// }

// if(isset($_POST['signin'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     $result = $user->findOne(['username' => $username]);

//     if(strcmp($result['username'], $username)  == 0 && password_verify($password, $result['password'])){
//         session_start();
//         $_SESSION['auth'] = 'true';
//         $_SESSION['id'] = $result['_id'];
//         $_SESSION['username'] = $username;
//         $_SESSION['password'] = $password;

//         header('location: MoviesPage/movies.php');
//     }
//     else{
//         header("Location: WebProject/signin.php");
//     }

// }

// if(isset($_POST['favorite'])){
//     $movieId = $_POST['movie_id'];
//     $id = $_POST['id'];

//     $favorites = [];

//     $result = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);
//     $favorites = (Array)$result['favorites'];

//     if(in_array($movieId, $favorites) == FALSE){
//         array_push($favorites, $movieId);
//         $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//         ['$set' =>
//         ['favorites' => $favorites
//         ]]);
//     }
    
//     header('location: MoviesDetails/index.php?id='.$movieId);

// }

// if(isset($_POST['remove_favorite'])){
//     $movieId = $_POST['movie_id'];
//     $id = $_POST['id'];

//     $favorites = [];

//     $result = $user->findOne(['_id' => new \MongoDB\BSON\ObjectID($id)]);
//     $favorites = (Array)$result['favorites'];
//     unset($favorites[array_search($movieId, $favorites)]);
//     $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//         ['$set' =>
//         ['favorites' => $favorites
//         ]]);
    
//     header('location: MoviesDetails/index.php?id='.$movieId);

// }

// if(isset($_POST['edit'])){
//     $username = $_POST['username'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $aboutme = $_POST['aboutme'];
//     $id = $_POST['id'];
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);


//     $query = $user->find(['username' => $username]);
//     $query2 = $user->find(['email' => $email]);

//     $countUser = 0;
//     $countEmail = 0;
//     foreach($query as $obj){
//         $countUser++;
//         header("Location: WebProject/signin.php");
//     }
//     foreach($query2 as $obj){
//         $countEmail++;
//         header('location: EditProfilePages/edit.php');
//     }


//     if($countUser > 0 && $countEmail == 0){
//         echo 'hi';

//         if(!empty($password)){
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             [
//             'email' => $email,
//             'password' => $hashed_password,
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
    
            
//         }
//         else{
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             [
//             'email' => $email,
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
//         }
     
//         header('location: EditProfilePages/edit.php');



//     }
//     if($countUser == 0 && $countEmail > 0){
//         if(!empty($password)){
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             ['username' => $username,
//             'password' => $hashed_password,
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
    
            
//         }
//         else{
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             ['username' => $username,
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
//         }
//         header('location: EditProfilePages/edit.php');

       

//     }
//     if($countUser == 0 && $countEmail == 0){

//         if(!empty($password)){
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             ['username' => $username,
//             'email' => $email,
//             'password' => $hashed_password,
//             'aboutme' => $aboutme
            
//             ]]);
//             $_SESSION['password'] = $password;
    
//         }
//         else{
//              $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             ['username' => $username,
//             'email' => $email,
//             'aboutme' => $aboutme
            
//             ]]);
//             $_SESSION['password'] = $password;
//         }
//         header('location: EditProfilePages/edit.php');

       
//     }
//     if($countUser > 0 && $countEmail > 0){
//         echo 'hi';

//         if(!empty($password)){
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             [
//             'password' => $hashed_password,
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
    
//         }
//         else{
//             $user->updateOne(['_id' => new \MongoDB\BSON\ObjectID($id)],
//             ['$set' =>
//             [
//             'aboutme' => $aboutme
//             ]]);
//             $_SESSION['password'] = $password;
//         }
//         header('location: EditProfilePages/edit.php');
        

//     }

   


// }

// if(isset($_POST['addcomment'])){
//     $text = $_POST['comment'];
//     $id = $_POST['id'];
//     $forum_id = $_POST['forum_id'];
//     $new_comment = [
//         'text' => $text,
//         'ownerid' => new \MongoDB\BSON\ObjectID($id),
//         'movieId' => $forum_id
//     ];

//     $result = $comment->insertOne($new_comment);
//     header('location: Forum/forum.php?id='.$forum_id);

// }


// if(isset($_POST['delete_comment'])){
//     $comment_id = $_POST["delete_comment"];
//     $forum_id = $_POST['forum_id'];
//     $comment->deleteOne(['_id' => new \MongoDB\BSON\ObjectID($comment_id)]);
//     header('location: Forum/forum.php?id='.$forum_id);

// }

// if(isset($_POST['edit_comment'])){
//     $text = $_POST['comment'];
//     $id = $_POST['id'];
//     $comment->updateOne(['_id' => new  \MongoDB\BSON\ObjectID($id)],
//     ['$set' =>[
//         'text' => $text
//     ]]);

//     $newComment = $comment->findOne(['_id' => new  \MongoDB\BSON\ObjectID($id)]);

    
//     header('location: Forum/forum.php?id='.$newComment['movieId']);


// }














?>
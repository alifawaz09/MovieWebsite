<?php 
session_start();
if(!$_SESSION['auth']){
  header("Location: http://localhost/phase2-mongo/WebProject/signin.php");

}


?>
<?php

session_start();
session_unset();
session_destroy();
header('location: http://localhost/phase2-mongo/WebProject/signin.php');





?>
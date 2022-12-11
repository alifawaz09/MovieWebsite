<?php

require 'C:/xampp/htdocs/vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");


$user = $client->moviedb->user;
$comment = $client->moviedb->comment;
$movies = $client->moviedb->movies;
$ratings = $client->moviedb->ratings;

?>
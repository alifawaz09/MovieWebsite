<?php

function getGenre($genre){

    
    $genre2 = str_replace("[", "", $genre);
    $genre3 = str_replace("]", "", $genre2);
    $genre4 = explode(",", $genre3);
    $genre5 = [];
    substr($genre4[1], 10, -2);
    for($i = 1; $i <=sizeof($genre4) ; $i+=2){
        $new =array_push($genre5, substr($genre4[$i], 10, -2));
    }
    return $genre5;
    
}

function getCompanies($company){

    
    $genre2 = str_replace("[", "", $company);
    $genre3 = str_replace("]", "", $genre2);
    $genre4 = explode(",", $genre3);
    $genre5 = [];
    for($i = 0; $i <=sizeof($genre4) ; $i+=2){
        $new =array_push($genre5, substr($genre4[$i], 10, -1));
    }
    return $genre5;
    
}

function getPoster($movie){

    $curl = curl_init();

    $newmovie = str_replace(' ', '%20', $movie);
    
    curl_setopt_array($curl, [
        CURLOPT_URL => "https://contextualwebsearch-websearch-v1.p.rapidapi.com/api/Search/ImageSearchAPI?q=".$newmovie."&pageNumber=1&pageSize=10&autoCorrect=true",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "X-RapidAPI-Host: contextualwebsearch-websearch-v1.p.rapidapi.com",
            "X-RapidAPI-Key: 5e47e6baf1msh62468372c4c9d2ap17faddjsn45e236970ef8"
        ],
    ]);
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    curl_close($curl);
    
    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $json = json_decode($response, true);
        return $json['value'][0]['url'];
    }
    
    
    
    
    
}



?>
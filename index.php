<?php

$jsonArray = [
    
        "slackUsername" => "Sochi-Mbata",
        "backend" => true,
        "age" => 25,
        "bio" => "Fullstack developer looking to improve my skills"
    
];

$mydata = json_encode($jsonArray, JSON_PRETTY_PRINT);
echo $mydata;


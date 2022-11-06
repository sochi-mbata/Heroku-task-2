<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header("Access-Control-Allow-Methods: POST");
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] =="GET"){
        $details = [
                "slackUsername" => "Sochi-Mbata",
                "backend" => true,
                "age" => 25,
                "bio" => "Fullstack developer looking to improve my skills"
        ];
        echo json_encode($details, JSON_PRETTY_PRINT);
}


elseif ($_SERVER['REQUEST_METHOD'] =="POST"){
        $json = file_get_contents('php://input');
        //decode json contents to php object
        $data = json_decode($json, true);

        //declaring other variables
        $operators = ['addition', 'subtraction', 'multiplication'];
        $operation_type = (strtolower($data['operation_type']));
        $x = $data['x'];
        $y = $data['y'];
        $slackUsername = "Sochi-Mbata";
        $result = "";
        
        if ($operation_type == ''){
                die(json_encode(['error' => 'Please specify operation type']));
        }
        elseif (is_nan($x) || is_nan($y)) {
                die(json_encode(['error' => 'Please enter a valid integer']));
        }
        else {  
                if(in_array($operation_type, $operators) && $operation_type=='addition'){
                        $result = $x + $y;
                    }
                    
                if(in_array($operation_type, $operators) && $operation_type=='multiplication'){
                $result = $x * $y;
                }
                
                if(in_array($operation_type, $operators) && $operation_type=='subtraction'){
                $result = $x - $y;
                }
                
                $endpoint = [
                        "slackUsername" => $slackUsername,
                        "result" => $result,
                        "operation_type" => $operation_type
                ];
                echo json_encode($endpoint, JSON_PRETTY_PRINT);
        }
}
else{
        die( json_encode(['error' => 'Invalid request']));
}


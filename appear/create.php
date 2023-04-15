<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once "../connect.php";
// require_once "../connectDEBUG.php";
require_once "appear.php";

// Instantiate Appear object
$appear = new Appear($connect);

// Get raw data
$data = json_decode(file_get_contents("php://input"));

$appear->id = $data->id;
$appear->userID = $data->userID;
$appear->openDate = $data->openDate;
$appear->dismissDate = $data->dismissDate;
$appear->lastTappedButton = $data->lastTappedButton;
if(isset($data->isPurchased)) {
    $appear->isPurchased = $data->isPurchased;
}
$appear->paywallVersion = $data->paywallVersion;

// Create
$appear->create();

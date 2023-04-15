<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

require_once "../connect.php";
// require_once "../connectDEBUG.php";
require_once "appUser.php";

// Instantiate AppUser object
$appUser = new AppUser($connect);

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

$appUser->id = $data->id;
$appUser->appName = $data->appName;
$appUser->os = $data->os;
$appUser->createdAt = $data->createdAt;

// Create post
$appUser->create();

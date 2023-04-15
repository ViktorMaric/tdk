<?php

/*kapcsolat felépítése */
$db = 'paywall'; //ezt cseréld ki a sajátodra!!!
$connect = mysqli_connect("127.0.0.1", "root", "");

// if ($connect) {
//     echo "Connected";
// } else {
//     echo "Not connected";
// }

/*Adatbázis kiválasztása*/
mysqli_select_db($connect, $db) or die("Nem lehet megnyitni a következő adatbázist: " . $db . " ");

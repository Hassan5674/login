<?php

$host = "localhost";
$username = "root";
$password = "";
$db = "mylogin2";

$conn = new mysqli($host,$username,$password,$db);

if ($conn->connect_error) {
    echo "ERROR: In COnnection";
};


?>
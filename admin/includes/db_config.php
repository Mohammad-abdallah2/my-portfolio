<?php 

$db_host = 'localhost';
$db_user = 'abduallah';
$db_pass = '2872000';
$db_name = 'task28';

//connect to db
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// check connection
if ($conn->connect_error) {
    die( 'Connection failed: ' . $conn->connect_error );
}

define('APP_NAME', 'ADMIN');


?>
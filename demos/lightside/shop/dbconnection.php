<?php
    $dbhost = 'localhost:3306';
    $dbuser = 'robot';
    $dbpass = 'qwerASDF12';
    $db = 'lightside';
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $db);

    if ($mysqli->connect_errno){
        die("Could not connect: " . $mysqli->connect_error);
    }
?>
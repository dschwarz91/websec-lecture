<?php
session_start();

$formdata = array(
    'u' => $_SESSION['uname'],
    'm' => $_POST['message']
);

$curdata = json_decode(file_get_contents('messages.json'), true);

array_push($curdata['messages'], $formdata);

file_put_contents('messages.json', json_encode($curdata, JSON_PRETTY_PRINT));

header('Location: foverview.php?uname='.$_SESSION['uname']);

?>

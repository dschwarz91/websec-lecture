<?php
session_start();

$mID = $_GET['mID'];

$curdata = json_decode(file_get_contents('messages.json'), true);
unset($curdata['messages'][$mID]);
file_put_contents('messages.json', json_encode($curdata, JSON_PRETTY_PRINT));

header('Location: foverview.php?uname='.$_SESSION['uname']);

?>

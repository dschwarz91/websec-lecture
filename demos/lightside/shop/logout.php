<?php
	session_start();
	$loginurl = (isset($_SESSION['loginurl'])) ? $_SESSION['loginurl'] : "login.php";
	session_destroy();
	header('Location: ' . $loginurl);
?>
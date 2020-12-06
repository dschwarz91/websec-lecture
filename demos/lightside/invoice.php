<?php
	$filename = $_GET['f'];
	$dir = "./202010/";
	header('Content-disposition: attachment; filename='.$filename);
	readfile($dir.$filename);
?>

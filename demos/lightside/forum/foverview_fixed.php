<?php
session_start();
?>
<html>
    <head><title>Jedi Forum 3000</title></head>
    <body>
        <h1>Welcome <?php echo(htmlentities($_GET['uname'])); ?></h1>
        <form action="flogout.php">
            <input type="submit" value="Logout"/>
        </form>
        <?php
            if (isset($_GET['uname'])){
                $_SESSION['uname'] = $_GET['uname'];
            }

            $jsonContent = json_decode(file_get_contents("messages.json"), true);

            foreach ($jsonContent['messages'] as $nr => $message){
                echo "Nachricht Nr:" .$nr."<br>User: ".htmlentities($message["u"])."<br>".htmlentities($message["m"])."<br>";
                if ($_SESSION['uname'] == "admin"){
                    echo "
                        <form action='delete.php'>
                            <input type='hidden' name='mID' id='mID' value='".$nr."'/>
                            <input type='submit' value='Delete'/>
                        </form>
                    ";
                }
                echo "<br>";
            }

        ?>
        <form action="save.php" method="post">
            <label for="message">Your message:</label><br>
            <textarea id="message" name="message" rows="5" cols="30">Your message goes here</textarea><br><br>
            <input type="submit" value="Post"/>
        </form>
    </body>
</html>

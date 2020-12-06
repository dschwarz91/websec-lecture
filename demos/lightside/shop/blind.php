<?php
include 'dbconnection.php';
$id = (isset($_GET['id'])) ? $_GET['id'] : "";
?>
<html>
    <head><title>Ultimate Lightsaber Shop</title></head>
    <body>
        <h1>Ultimate Lightsaber Shop</h1>
        Can you guess a valid id of a lightsaber?<br><br>
        <form>
            <input name="id" id="id" type="text" value="<?php echo $id; ?>"/>
            <input type="submit" value="check"/>
        </form>
        <?php
            if ($id != ""){
                $sql = "Select picture from lightsabers where id = " . $id . ";";
                $result = $mysqli->query($sql);

                if(!$mysqli->error){
                    $pic = $result->fetch_object();

                    if ($pic !== NULL){
                        echo '<img src="' . $pic->picture . '" />';
                    }
                    else
                        $errormsg = "Username or password is wrong.";
                }
                else
                    die($mysqli->error);
            }
        ?>
    </body>
</html>

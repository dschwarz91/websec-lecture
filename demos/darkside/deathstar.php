<?php
#session_set_cookie_params(600, '/; SameSite=None');
session_start();

if(isset($_POST['setstatus']))
    $_SESSION['dsstatus'] = $_POST['setstatus'];

if(isset($_SESSION['dsstatus']))
    $status = $_SESSION['dsstatus'];
else
    $status = "inactive";

$color = ($status == "active") ? "red" : "green";

?>
<html>
    <head>
        <title>Death Star Status</title>
        <style>
            h1 {
                color: <?php echo $color; ?>;
            }
        </style>
    </head>
    <body>
        <h1>Current Status: <?php echo($status); ?></h1>
        <div>
        <form method="post">
            <input type="submit" name="setstatus" value="inactive" />
        </form>
        <form method="post">
            <input type="submit" name="setstatus" value="active" />
        </form>
        </div>
    </body>
</html>
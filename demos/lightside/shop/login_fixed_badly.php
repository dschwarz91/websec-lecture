<?php
session_start();
$_SESSION['loginurl'] = "login_fixed.php";
include 'dbconnection.php';

if (isset($_POST['uname']) and isset($_POST['pwd'])){
    $uname = $_POST['uname'];
    $pwd = $_POST['pwd'];
    $sql = "Select title, name, uname, password from users where uname = ? and password = $;";
    $sql = str_replace("$", "'{$pwd}'", $sql);
    $statement = $mysqli->prepare($sql);
    $statement->bind_param('s', $_POST['uname']);
    $statement->execute();
    $user = $statement->get_result()->fetch_object();
    if ($user !== NULL)
        echo("Login succeeded!");
    else
        echo("Login failed!");
}

?>
<html>
    <title>Ultimate Lightsaber Shop</title>
	<body>
		<h1>Hey fellow jedi, welcome to our lightsaber shop!</h1>
		<form method="post">
			<label for="uname">Username:</label>
            <input type="text" id="uname" name="uname"/><br><br>
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" name="pwd"/><br><br>
			<input type="submit" value="Login"/>
        </form>
        <?php
            if (isset($errormsg))
                echo $errormsg;
        ?>
    </body>
</html>
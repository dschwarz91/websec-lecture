<?php
session_start();
$_SESSION['loginurl'] = "login_fixed.php";
include 'dbconnection.php';

if (isset($_POST['uname']) and isset($_POST['pwd'])){
    $sql = "Select title, name, uname, password from users where uname = ?;";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param('s', $_POST['uname']);
    $statement->execute();
    $result = $statement->get_result();

    if(!$mysqli->error){
        $user = $result->fetch_object();

        if ($user !== NULL && $user->password == $_POST['pwd']){
            $_SESSION['uname'] = $user->uname;
            header('Location: index.php');
            die('Successful.<a href="index.php">enter</a>');
        }
        else
            $errormsg = "Username or password is wrong.";
    }
    else
        die($mysqli->error);
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
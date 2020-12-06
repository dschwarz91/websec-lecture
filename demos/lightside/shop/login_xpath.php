<?php
session_start();
$_SESSION['loginurl'] = "login_xpath.php";

if (isset($_POST['uname']) and isset($_POST['pwd'])){
    $xml = simplexml_load_file('users.xml');

    if ($xml !== FALSE){
        $result = $xml->xpath("//user[uname='" . $_POST['uname'] . "'][password='" . $_POST['pwd'] . "']");

        if ($result != NULL)
        {
            $user = $result[0];
            $_SESSION['uname'] = (string)$user->uname;
            header('Location: index.php');
            die('Successful.<a href="index.php">enter</a>');
        }
        else
            $errormsg = "Username or password is wrong.";
    }
    else
        die("XML-Error occured: " . libxml_get_errors());  
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
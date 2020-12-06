<?php

class User{
    public $uname;
    public $role;
}

if(isset($_POST['uname']) && isset($_POST['role']))
{
    $user = new User;
    $user->uname = $_POST['uname'];
    $user->role = $_POST['role'];
    echo(htmlentities(serialize($user)));
}
?>

<html>
    <head><title>Object Creator</title></head>
    <body>
        <form method="post">
            <input type="text" name="uname" />
            <input type="text" name="role" />
            <input type="submit" value="Generate serialized string" />
        </form>

    </body>
</html>
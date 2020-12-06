<?php

class User{
    public $uname = "Luke";
    public $role = "Jedi";

    public function __construct()
    {
        $this->customlog($this->uname, "{$this->uname} created.\n");
    }

    public function __wakeup()
    {
        $this->customlog($this->uname, "{$this->uname}:{$this->role} loaded.\n");
    }

    protected function customlog($fname, $fcontent)
    {
        if(!file_exists($fname)){
            touch("logs/".$fname);
        }
        file_put_contents("logs/".$fname, $fcontent, FILE_APPEND);
    }
}

if(isset($_POST['user_data']))
    $user = unserialize($_POST['user_data']);
else
    $user = new User;
?>

<html>
    <head><title>Serialization</title></head>
    <body>
        <h1>Welcome <?php echo($user->uname); ?></h1>
        Your role: <?php echo($user->role); ?>

        <form method="post">
            <input type="hidden" name="user_data" value='<?php echo(serialize($user)); ?>'></input>
            <input type="submit" value="Do something" />
        </form>

    </body>
</html>


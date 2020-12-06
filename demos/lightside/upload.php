<?php
session_start();
$uploadfolder = "./pics/";

if (isset($_POST["action"]) && $_POST["action"] == "reset"){
    $_SESSION['profilepic'] = "Ben_Kenobi.png";
    // TODO: delete other pics in pics folder
}

if (!empty($_FILES)){
    #print_r($_FILES);
    move_uploaded_file($_FILES['pic']['tmp_name'], $uploadfolder.$_FILES['pic']['name']);
    $_SESSION['profilepic'] = $_FILES['pic']['name'];
}


$picsrc = (isset($_SESSION['profilepic'])) ? $_SESSION['profilepic'] : "Ben_Kenobi.png";
?>
<html>
    <title>Profile page</title>
	<body>
		<h1>Welcome Master Kenobi</h1>
        Nice profile pic you have here.<br><br>
        <img src="<?php echo $uploadfolder.$picsrc; ?>" /><br><br>
        Still wann upload a new one?
		<form method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			<input name="pic" type="file" accept="image/jpeg,image/png">
			<input type="submit" value="Upload"/>
        </form>
        <br>
        <form method="post">
            <input type="hidden" name="action" value="reset" />
            <input type="submit" value="Go back to initial one and delete all others." />
        </form>
    </body>
</html>
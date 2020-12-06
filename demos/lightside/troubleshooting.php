<html>
	<head><title>Jedi Troubles</title></head>
	<body>
        
		<h1>Hey fellow jedi, do you have any troubles with this server?</h1>

        <form>
            <select name="type" id="type" onchange="this.parentElement.submit()">
                <option value="0">Select what you want to see</option>

                <?php
                    $selectedError = ($_GET["type"] == "error") ? "selected" : "";
                    $selectedAccess = ($_GET["type"] == "access") ? "selected" : "";
                ?>

                <option value="error" <?php echo $selectedError; ?>>Errors</option>
                <option value="access" <?php echo $selectedAccess; ?>>Access</option>
            </select>
        <form>
        <div id="results">
            <?php
                if(isset($_GET["type"]) && $_GET["type"] != "0"){
                    $result = shell_exec("tail /var/log/apache2/" . $_GET["type"] . ".log");
                    echo "<pre>{$result}</pre>";
                }
            ?>
        </div>
    </body>
</html>
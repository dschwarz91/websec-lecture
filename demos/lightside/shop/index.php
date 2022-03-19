<?php
    session_start();
    if(!isset($_SESSION['uname'])){
        $loginurl = (isset($_SESSION['loginurl'])) ? $_SESSION['loginurl'] : "login.php";
        header('Location: ' . $loginurl);
        die("<a href='login.php'>Login</a>");
    }
    include 'dbconnection.php';
?>
<html>
    <head>
        <title>Ultimate Lightsaber Shop</title>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
            }
        </style>
        <script>
            function checkStock(url, id){
                fetch("http://lightside.me/shop/stockChecker.php?url="+ url + '&id=' + id)
                    .then(response => response.text()).then(data => {
                        document.getElementById('lblStock').innerText = data;
                    })
                    .catch(error => {
                        alert("No stock data available.");
                    });
            }
        </script>
    </head>
    <body>
        <h1>Ultimate Lightsaber Shop</h1>
        We now have all those fance darkside sabers in stock for you!<br><br>

        <form>
            <label for="sid">Which one would you like to see?</label>
            <select name="sid" id="sid" onchange="this.parentElement.submit()">
                <option value="0">Select</option>
                <?php
                    $sql = "Select id, title from lightsabers;";
                    $results = $mysqli->query($sql);

                    while ($row = $results->fetch_object()){
                        $selected = ($_GET["sid"] == $row->id) ? "selected" : "";
                        echo "<option value='" . $row->id . "' " . $selected . ">" . $row->title . "</option>";
                    }
                ?>
            </select>
        </form>
        <div>
            <table>
            <?php
                if (isset($_GET["sid"])){
                    $sql = "Select id, title, descr, price, picture, partnershop from lightsabers where id = '" . $_GET['sid'] . "';";
                    $results = $mysqli->query($sql);
                    if(!$mysqli->error){
                        while ($row = $results->fetch_object()){
                            echo '<tr>';
                            echo '<td>'.$row->id.'</td><td>'.$row->title.'</td><td>'.$row->descr.'</td><td>'.$row->price.'</td><td><img src="'.$row->picture.'"/></td>';
                            echo '<td><input type="submit" name="checkStock" value="Check Availability" onclick="checkStock(\''.$row->partnershop.'\', \''.$row->id.'\')"/><label id="lblStock" style="margin-left:5px;"></label></td>';
                            echo '</tr>';
                        }
                    }
                    else
                        die($mysqli->error);
                    
                }
            ?>
            </table>
        </div>
        <form action="logout.php">
            <label>User: <?php echo $_SESSION['uname']; ?></label>
            <input type="submit" value="Logout">
        </form>
    </body>
</html>
<html>
    <title>Students Registration</title>
	<body>
		<h1>Welcome Master Kenobi</h1>
        Do you have any new students to register?<br><br>
		<form method="post" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000">
			<input name="students" type="file" accept="text/xml">
			<input type="submit" value="Upload"/>
        </form>
    </body>
    <div>
        <?php
            if (!empty($_FILES)){
                libxml_disable_entity_loader(false);
                $xml = simplexml_load_file($_FILES['students']['tmp_name'], 'SimpleXMLElement', LIBXML_NOENT);
                echo "Successfully imported the following students: <pre>";
                
                foreach($xml->student as $student){
                    echo "New Student: {$student->firstname} {$student->lastname} <br>";
                }
                echo "</pre>";
                
            }
        ?>
    </div>
</html>
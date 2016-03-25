<?php
session_start();
 ?>

<!doctype html>
<html>
<head>
<title>Upload | PhotShare</title>
</head>

<body>
<h1>Upload</h1>
<hr>
<form action="upload.php" method="post">
<fieldset>
    <legend>Image Information</legend>
    <div>
        <label for="photo_id">Photo ID:</label>
        <?php
            $photo_id = mt_rand();
            echo $photo_id;
            $_POST["photo_id"] = $photo_id;
        ?>
        <br>
    </div>
    <div>
        <label for="user">User:</label>
        <?php

        $user = $_SESSION['username'];
        echo $user;
        $_POST['user'] = $user;

         ?>
         <br>
    </div>
    <div>Permissions: <br />
        <input type="radio" name="permission" value="public" checked>Public<br>
        <input type="radio" name="permission" value="private">Private<br>
        <input type="radio" name="permission" value="specific group">Specific Group<br>
    </div>
    <div>
        <label for="subject">Subject:</label>
        <input id="subject" type="text" name="subject">
    </div>
    <div>
        <label for="place">Place:</label>
        <input id="place" type="text" name="place" size="20" maxsize="">
    </div>
    <div>
        <label for="timing">Timing:</label>
        <input id="timing" type="text" name="timing" size="10" maxsize="8" value="DD/MM/YY">
    </div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" type="text" name="description" rows=10 cols=70 maxsize="2048" value="Describe your photo..."></textarea>
    </div>
    <div>
        <label for="imageupload">Photo(s) to include:</label><input id="imageupload" name="imageuploads[]" type="file" multiple/></br>
    </div>

</body>
</html>

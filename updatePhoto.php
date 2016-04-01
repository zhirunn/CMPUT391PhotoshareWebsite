<?php
session_start();
 ?>

<!doctype html>
<html>
<head>
<title>Update Photo Info | PhotoShare</title>

</head>

<body>
<h1>Update</h1>
<hr>
<form action="updatePhotoConfirmation.php" enctype="multipart/form-data" method="post">
<fieldset>
    <legend>Information to update</legend>

    <div>
        <label for="subject">Subject:</label>
        <input id="subject" type="text" name="subject">
    </div>
    <div>
        <label for="place">Place:</label>
        <input id="place" type="text" name="place" size="20" maxsize="">
    </div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" type="text" name="description" rows=10 cols=70 maxsize="2048" value="Describe your photo..."></textarea>
    </div>
    <div>Permissions: <br />
        <input id="group_id" type="text" name="permission" size="80" maxsize="" placeholder="1 for public, 2 for private, any other number for other groups">

    </div>
    <div>
        <input type="submit" name="submit" value="Update">
    </div>
</fieldset>
</form>

</body>
</html>


<! http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP>
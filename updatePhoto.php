<?php
session_start();
 ?>

<!doctype html>
<html>
<head>
<title>Update Photo Info | PhotoShare</title>

<! Functionality for showing hidden input form from Hugh Craig.>
<script>
function showHidden() { document.getElementByID('groupid').style.display = 'block'; }
function hideHidden() { document.getElementByID('groupid').style.display = 'none'; }
</script>
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
        <input type="radio" name="permission" value="private" onclick="hideHidden();" checked>Private<br>
        <input type="radio" name="permission" value="public" onclick="hideHidden();" >Public<br>
        <input type="radio" name="permission" value="specific group" onclick="showHidden();">Specific Group
        <input type="text" name="groupID" class = "form-control" id="groupID" style="display:none; width:400px" placeholder="Group ID">

    </div>
    <div>
        <input type="submit" name="submit" value="Update">
    </div>
</fieldset>
</form>

</body>
</html>


<! http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP>
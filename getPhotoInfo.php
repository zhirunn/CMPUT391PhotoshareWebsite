<?php
session_start();
 ?>

<!doctype html>
<html>
<head>
<title>Upload | PhotShare</title>

<! Code for JQuery Datepicker from jqueryui.com>
<meta charset="utf-8">
<title>jQuery UI Datepicker - Default functionality</title>
<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css">
<script>
$(function() {
    $( "#datepicker" ).datepicker();
});
</script>

<! Functionality based on advice from Hugh Craig.>
<script>
function showHidden() { document.getElementByID('groupid').style.display = 'block'; }
function hideHidden() { document.getElementByID('groupid').style.display = 'none'; }
</script>
</head>

<body>
<h1>Upload</h1>
<hr>
<form action="upload.php" enctype="multipart/form-data" method="post">
<fieldset>
    <legend>Photo Information</legend>
    <div>Permissions: <br />
        <input type="radio" name="permission" value="private" onclick="hideHidden();" checked>Private<br>
        <input type="radio" name="permission" value="public" onclick="hideHidden();" >Public<br>
        <input type="radio" name="permission" value="specific group" onclick="showHidden();">Specific Group<br>

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
        <label for="datepicker">Date:</label> 
        <script>
        var $datepicker = $('#datepicker');
        $datepicker.datepicker({
        dateFormat: 'dd-mm-yy'
        }).val();
        $datepicker.datepicker('setDate', new Date());
        </script>
        <input id="datepicker" name="datepicker" type="text">
    </div>
    <div>
        <label for="description">Description:</label><br>
        <textarea id="description" type="text" name="description" rows=10 cols=70 maxsize="2048" value="Describe your photo..."></textarea>
    </div>
    <div>
        <label for="photouploads">Photo(s) to include:</label><input id="photouploads" name="photouploads[]" type="file" multiple/></br>
    </div>
    <div>
        <input type="submit" name="submit" value="Upload">
    </div>
</fieldset>
</form>

</body>
</html>

<! http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP>
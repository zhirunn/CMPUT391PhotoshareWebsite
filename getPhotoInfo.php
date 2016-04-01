<?php
session_start();
 ?>

<!doctype html>
<html>
<head>
<title>Upload | PhotoShare</title>
<html>
  <div class="page-header">
  <h2>PhotoInsanity App</h2>
  </div>
 </html>
 <html lang = "en">
<head>
<title>Ourwebsite.com/search_result</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
  integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- CSS for navigation bars -->
  <link rel="stylesheet" href="include/css/nav.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
  integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<style>
  body {
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="landing_page.php">Go Back</a></li>
        <li role="separator" class="divider"></li>
      </ul>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

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


<body>
<h1>Upload</h1>
<hr>
<form action="upload.php" enctype="multipart/form-data" method="post">
<fieldset>
    <legend>Photo Information</legend>
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
        <input id="group_id" type="text" name="permission" size="80" maxsize="" placeholder="1 for public, 2 for private, any other number for other groups">
    </div>
    <div>
        <input type="submit" name="submit" value="Upload">
    </div>
</fieldset>
</form>

</body>
</html>


<! http://techstream.org/Web-Development/PHP/Single-File-Upload-With-PHP>
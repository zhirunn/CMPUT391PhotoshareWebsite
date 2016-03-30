<html>
  <div class="page-header">
  <h2>PhotoInsanity App</h2>
</div>
</html>
<?php 
	session_start();
	$conn = oci_connect("wong5", "Justin15Wong");
	$username = $_SESSION["username"];
	$query = ("SELECT first_name FROM persons, users WHERE persons.user_name = :username");
	$fn = oci_parse($conn, $query);
  oci_bind_by_name($fn, ":username", $username);
  oci_execute($fn);
	$first_name = oci_fetch_row($fn);
	echo "<h1>Hello $first_name[0]</h1>";
  oci_close($conn);
 ?>
<html lang = "en">
<head>
<title>Ourwebsite.com/home</title>

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
        <li><a href="#">Gallery</a></li>
        <li><a href="image_gallery.html">My Pictures</a></li>
        <li><a href="getPhotoInfo.php">Upload Photo</a></li>
        <li><a href="group_homepage.php">Groups</a></li>
        <li><a href="#">Help</a></li>
        <li><a href="search.php">Search</a></li>
        <li><a href="logout.php">Logout</a></li>
        <li role="separator" class="divider"></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
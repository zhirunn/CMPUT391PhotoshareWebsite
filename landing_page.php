<?php 
	session_start();
	$conn = oci_connect("wong5", "Justin15Wong");
	$username = $_SESSION["username"];
	$query = ("SELECT first_name FROM persons, users WHERE persons.user_name = :username");
	$fn = oci_parse($conn, $query);
   oci_bind_by_name($fn, ":username", $username);
   oci_execute($fn);
	$first_name = oci_fetch_row($fn);
	echo "Hello $first_name[0]";
 ?>
<html lang = "en">
<head>
<title>Ourwebsite.com/home</title>
</head>
<style>
  body {
    padding-top: 5%;
    padding-bottom: 5%;
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
        <li><a href="http://consort.cs.ualberta.ca/~preyansh/image_gallery.html">Gallery</a></li>
        <li><a href="#">My Pictures</a></li>
        <li><a href="#">Upload Photo</a></li>
        <li><a href="http://consort.cs.ualberta.ca/~preyansh/group_homepage.php">Groups</li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
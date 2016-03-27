<?php 
	session_start();
 ?>
<html lang = "en">
<head>
<title>Ourwebsite.com/home</title>
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
        <li><a href="http://consort.cs.ualberta.ca/~preyansh/image_gallery.html">My Groups</a></li>
        <li><a href="http://consort.cs.ualberta.ca/~preyansh/group_signup.php">Create New Group</li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search for Groups">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
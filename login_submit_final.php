<html>
<?php
session_start();
?>
<head>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<title>Login | Photoshare</title>
</head>

<body>
<h2>Login Here</h2>
<form action="PHPconnectionDB_final.php" method="post">
<fieldset class="form-group">
<p>
<label for="username">Username</label>
<input type="text" class="form-control" id="username" name="username" value="" maxlength="40" placeholder="Enter username" />
</p>
<p>
<label for="passwordd">Password</label>
<input type="text"class="form-control" id="passwordd" name="passwordd" value="" maxlength="40" placeholder="Password" />
</p>
<p>
<button type="submit" class="btn btn-primary">Login</button>
<button type="submit" class="btn btn-default">Register</button>
</p>
</fieldset>
</form>
</body>
</html>
<style>
  body {
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<!http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html>
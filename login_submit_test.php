<html>
<?php
session_start();
?>
<head>
<title>Login</title>
</head>

<body>
<h2>Login Here</h2>
<form action="PHPconnectionDB_test.php" method="post">
<fieldset>
<p>
<label for="username">Username</label>
<input type="text" id="username" name="username" value="" maxlength="40" />
</p>
<p>
<label for="passwordd">Password</label>
<input type="text" id="passwordd" name="passwordd" value="" maxlength="40" />
</p>
<p>
<input type="submit" value="Login" />
</p>
</fieldset>
</form>
</body>
</html>
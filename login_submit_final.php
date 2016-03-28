<html>
<?php
session_start();
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<title>Login | Photoshare</title>

	<script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">

	<?php
	if(isset($_SESSION['errors']['error5301']) && $_SESSION['errors']['error5301'] == 1) { ?>
		<script>
		sweetAlert("Username/password not correct!");
		</script>
	<?php }?>

</head>

<body>
	<div class="container">
		<form action="PHPconnectionDB_final.php" method="post" class="form-signin">
			<h2 class="form-signin-heading">Please sign in</h2>
			<div class="form-group">
				<label for="username" class="sr-only">Username</label>
				<input type="text" class="form-control" id="username" value="" maxlength="40" placeholder="Enter username">
			</div>
			<div class="form-group">
				<label for="passwordd" class="sr-only">Password</label>
				<input type="text" class="form-control" id="passwordd" value="" maxlength="40" placeholder="Password">
			</div>
			<div>
				<button type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
			</div>
		</form>

		<div>
			<button id="register" class="btn btn-lg btn-default btn-block" >Register</button>

			<script type="text/javascript">
    			document.getElementById("register").onclick = function () {
        			location.href = "register.php";
    			};
			</script>
		</div>
	</div>

	<?php
	if(isset($_SESSION['errors'])){
    	unset($_SESSION['errors']);
	} ?>

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

<!Sources:>
<!http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html>
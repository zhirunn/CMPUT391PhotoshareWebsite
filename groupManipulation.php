<?php
session_start();
?>

<!doctype html>
<html>
<head>
	<title>My Groups | PhotoInsanity</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<style>
  		body {
    		background-color: #008080;
    		background-size: relative;
    		background-position: center;
    		background-repeat: no-repeat;
	}</style>

</head>

<body>
	<?php
	$conn = oci_connect("gd1", "N1o2t3h4i5");

	$username = $_SESSION['user_name'];
	$groupQuery = ("SELECT * FROM groups WHERE user_name = :username");
	$stid = oci_parse($conn, $groupQuery);

	oci_bind_by_name($stid, ":username", $username);

	oci_execute($stid);

	$count = oci_fetch_all($stid, $result);

	?>

	<table width=\"100%\" align=\"center\" cellpadding=\"5\" cellspacing=\"5\">
		<tr align=\"center\" class=\"source1\">

    		<td><strong>GROUP ID</strong></td>
    		<td><strong>GROUP NAME</strong></td>
    		<td><strong>DATE CREATED</strong></td>
    	</tr>
    </table>
	<?php if($count) {?>
    	
		<?php foreach($result as $row) { ?>
			<tr align="center" class="rows">
				<td><?php echo $row['GROUP_ID'];?></td>
				<td><?php echo $row['GROUP_NAME'];?></td>
				<td><?php echo $row['DATE_CREATED'];?></td>
			</tr>
		<?php }?>
	<?php } ?>

	<div class="dropdown">
  		<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown">Action
  		<span class="caret"></span></button>
  		<ul class="dropdown-menu">
    		<li><a href="addUser.php">Add an user</a></li>
    		<li><a href="removeUser">Remove an user</a></li>
    	</ul>
	</div>
</body>

</html>

<!http://stackoverflow.com/questions/34695910/why-oci-fetch-arraystid-dont-return-the-first-row-of-oracle-database-table>
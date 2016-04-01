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

	$username = $_SESSION['username'];
	$groupQuery = ("SELECT * FROM group_lists, groups WHERE groups.user_name = :username AND groups.group_id = group_lists.group_id");
	$stid = oci_parse($conn, $groupQuery);

	oci_bind_by_name($stid, ":username", $username);

	oci_execute($stid);

	?>

	<table>

    		<td><strong>GROUP ID</strong></td>
    		<td><strong>GROUP NAME</strong></td>
    		<td><strong>DATE CREATED</strong></td>
    	</tr>
    </table>
	<?php 
	while($result = oci_fetch_array($stid)) {
		//print_r($result);
		echo "<tr>";
		echo "<td>" .$result['GROUP_ID']. "</td><td></td>";
		echo "<td>" .$result['FRIEND_ID']. "</td><td></td>";
		echo "<td>" .$result['DATE_ADDED']. "</td><td></td>";
		echo "</tr>";

	}
	?>

	<div>
		<button id="addUser" class="btn btn-lg btn-default" >Add Friend to Group</button>

		<script type="text/javascript">
    		document.getElementById("addUser").onclick = function () {
        		location.href = "addUser.php";
    		};
		</script>
	</div>
		<div>
		<button id="removeUser" class="btn btn-lg btn-default" >Remove friend from Group</button>

		<script type="text/javascript">
    		document.getElementById("removeUser").onclick = function () {
        		location.href = "removeUser.php";
    		};
		</script>
	</div>
</body>

</html>

<!http://stackoverflow.com/questions/34695910/why-oci-fetch-arraystid-dont-return-the-first-row-of-oracle-database-table>
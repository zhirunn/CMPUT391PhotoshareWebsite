<html lang = "en">
<head>
<title>Ourwebsite.com/mygroups</title>
<?php 
	session_start();
	$conn = oci_connect("gd1", "N1o2t3h4i5");
	$username = $_SESSION["username"];
	$query = ("SELECT first_name FROM persons, users WHERE persons.user_name = :username");
	$fn = oci_parse($conn, $query);
   oci_bind_by_name($fn, ":username", $username);
   oci_execute($fn);
	$first_name = oci_fetch_row($fn);
	echo "<h1>Hello $first_name[0]</h1>";
  oci_close($conn);
 ?>

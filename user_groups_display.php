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
<title>Ourwebsite.com/mygroups</title>
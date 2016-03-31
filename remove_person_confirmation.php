<?php
session_start();
?>

<html>
<head>
	<title>Remove User | PhotoInsanity</title>
</head>

<body>
	<?php
	$conn = oci_connect("gd1", "N1o2t3h4i5");

	$group_id = $_POST['group_id'];
	$friend = $_post['friendtoremove'];

	$removeQuery = ("DELETE FROM group_lists WHERE group_id = :group_id AND friend_id = :friend");

	$stid = oci_parse("$conn","$removeQuery");

	oci_bind_by_name($stid, ":group_id", $group_id);
	oci_bind_by_name($stid, ":friend", $friend);

	oci_execute($stid);
	?>
</body>
</html>
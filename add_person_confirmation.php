<?php
session_start();
?>

<html>
<head>
	<title>Add confirmation | PhotoInsanity<title>

</head>
<body>
	<?php
	$conn=oci_connect("gd1", "N1o2t3h4i5");

	$group_id = $_POST['group_id'];
	$friend = $_POST['friendtoadd'];
	$date_added = date("d/M/Y");
	$notice = $_POST['notice'];

	$insertquery = ("INSERT INTO group_lists VALUES (:group_id, :friend, :date_added, :notice)");
	$stid = oci_parse($conn,$insertquery);

	oci_bind_by_name($stid, ":group_id", $group_id);
	oci_bind_by_name($stid, ":friend", $friend);
	oci_bind_by_name($stid, ":date_added", $date_added);
	oci_bind_by_name($stid, ":notice", $notice);

	oci_execute($stid);

	oci_close($conn);

	header("Location: landing_page.php");
	?>
</body>
</html>

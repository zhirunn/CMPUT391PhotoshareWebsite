<?php
session_start();
?>

<!doctype html>
<html>
<body>

<?php
	include ("PHPconnectionDB.php");

	$conn=oci_connect("wong5", "Justin15Wong");

	$user = $_SESSION['user_name'];
	$permission = $_POST['permission'];

	// Set the groupid appropriately
	if ($permission == "public") {
		$permission = 1;
	} else if($permission == "private") {
		$permission = 2;
	} else {
		$permission = $permission
	}

	$subject = $_POST['subject'];
	$place = $_POST['place'];
	$timing = $_POST['datepicker'];
	$description = $_POST['description'];

	// Create a photo id for each photo in photouploads[].
	// Check if they don't already exist in the database and if they don't, use it.
	// Create a thumbnail for each photo and upload each image to the server.
	$i = 1;
	foreach ($_FILES['photouploads']['tmp_name'] as $key => $tmp_name) {
		$photo_id = mt_rand();

		


		$insertquery = "INSERT INTO images VALUES ('$photo_id', '$user', '$permission', '$subject', '$place', '$timing', '$description', $thumbnail, $photo)";


	}


 ?>


</body>
</html>

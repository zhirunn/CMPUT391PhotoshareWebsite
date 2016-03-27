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
		$permission = $permission;
	}

	$subject = $_POST['subject'];
	$place = $_POST['place'];
	$timing = $_POST['datepicker'];
	$description = $_POST['description'];

	// Create a photo id for each photo in photouploads[].
	// Check if they don't already exist in the database and if they don't, use it.
	// Create a thumbnail for each photo and upload each image to the server.

	foreach ($_FILES['photouploads']['tmp_name'] as $key => $tmp_name) {
		
		$photo_id = mt_rand();

		// Create a thumbnail for each photo.
		$percent = 0.5;

		list($width, $height) = getimagesize($tmp_name);
		$newwidth = $width * $percent;
		$newheight = $height * $percent;

		$thumbnail = imagecreatetruecolor($newwidth, $newheight);

		$photoinfo = pathinfo("$tmp_name");

		$extensions = array("jpeg","jpg","png");


		/***if ($photoinfo['extension'] == 'jpeg') {
			$photo = imagecreatefromjpeg($tmp_name);
		} else if ($photoinfo['extension'] == 'jpg') {
			$photo = imagecreatefromjpeg($tmp_name);
		}/*** else {
			$photo = imagecreatefromgif($tmp_name);
		}***/

		imagecopyresized($thumbnail, $photo, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

		$photo = base64_encode($photo);
		$thumbnail = base64_encode($thumbnail);

		$insertquery = "INSERT INTO images VALUES (:photo_id, :user, :permission, :subject, :place, :timing, :description, :thumbnail, :photo)";
		$stid1 = oci_parse($conn, $insertquery);
        oci_bind_by_name($stid1, ":photo_id", $photo_id);
        oci_bind_by_name($stid1, ":user", $user);
        oci_bind_by_name($stid1, ":permission", $permission);
        oci_bind_by_name($stid1, ":place", $place);
        oci_bind_by_name($stid1, ":timing", $timing);
        oci_bind_by_name($stid1, ":description", $description);
        oci_bind_by_name($stid1, ":thumbnail", $thumbnail, -1, OCI_B_BLOB);
        oci_bind_by_name($stid1, ":photo", $photo, -1, OCI_B_BLOB);
        oci_execute($stid1);

	}
	oci_close($conn);


 ?>

</body>
</html>

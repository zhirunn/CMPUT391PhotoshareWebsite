<?php
	session_start();

	$subject = $_POST['subject'];
	$place = $_POST['place'];
  	$description = $_POST['description'];
  	$permission = $_POST['permission'];
    if ($permission == "public") {
        $permission = 1;
    } else if($permission == "private") {
        $permission = 2;
    } else {
        $permission = $permission;
    }
    $username=$_SESSION['username'];
    $photo_id=$_GET['id'];

    $conn = oci_connect("gd1", "N1o2t3h4i5");

    $updateQuery = ("UPDATE images SET permitted=:permission, subject=:subject, place=:place, description=:description WHERE photo_id=:photo_id AND owner_name=:username");
    $stid = oci_parse($conn, $updateQuery);

    oci_bind_by_name($stid, ":photo_id", $photo_id);
    oci_bind_by_name($stid, ":username", $username);
    oci_bind_by_name($stid, ":permission", $permission);
    oci_bind_by_name($stid, ":subject", $subject);
    oci_bind_by_name($stid, ":place", $place);
    oci_bind_by_name($stid, ":description", $description);

    oci_execute($stid);

    oci_close($conn);
    echo 'Your image has been updated.';
    header('Refresh: 2; URL = image_gallery.php');

?>
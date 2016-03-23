<?php
function connect(){
}
echo "Connected successfully";
?> 
	$conn = oci_connect('wong5', 'Justin15Wong');
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	return $conn;
}
?>

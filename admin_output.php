<html>

<?php
$conn = oci_connect('gd1', 'N1o2t3h4i5');
$query = "SELECT * FROM images";
$stid = oci_parse($conn, $query);
oci_execute($stid);
echo "<table>";
while($row = oci_fetch_row($stid)) { 
echo "<tr><td> User: " . $row[1] . "&nbsp;&nbsp;&nbsp;</td><td> Subject: " . $row[3] . "&nbsp;&nbsp;&nbsp;</td><td> Date: " . $row[5] . "</td></tr>";
//echo "<tr><td>" . $row['owner_name'] . "</td><td>" . $row['subject'] . "</td></tr>";
}
echo "</table>";
oci_close($conn);
?>

</html>
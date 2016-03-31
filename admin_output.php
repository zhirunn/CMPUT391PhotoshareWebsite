<html>

<?php
$conn = oci_connect('gd1', 'N1o2t3h4i5');

if(isset($_POST['user']) or isset($_POST['subject']) or isset($_POST['time'])) {
  $query0 = "SELECT ";
  $query1 = " GROUP BY ";

  if(isset($_POST['user'])) {
    $query0 .= "owner_name, ";
    $query1 .= "owner_name, ";
  }

  if(isset($_POST['subject'])) {
    $query0 .= "subject, ";
    $query1 .= "subject, ";
  }

  if(isset($_POST['time']) == 'weekly') {
    $query0 .= 'to_char(timing,\'IW\'),';
    $query1 .= 'to_char(timing,\'IW\'),';
  }

  if(isset($_POST['time']) == 'monthly') {
    $query0 .= 'to_char(timing,\'MON\'),';
    $query1 .= 'to_char(timing,\'MON\'),';
  }

  if(isset($_POST['time']) == 'yearly'){
	  $query0 .= ' EXTRACT(YEAR from timing),';
	  $query1 .= ' EXTRACT(YEAR from timing),';
  }

  $query1 = rtrim($query1," ,");
  $sqlquery .= $query0.' COUNT(photo_id)'; 
  $sqlquery .= " FROM images";
  $sqlquery .= $query1;

  $stid = oci_parse($conn, $sqlquery);
  oci_execute($stid);
  echo "<table>";

  while($row = oci_fetch_row($stid)) {
    $i = 0;
    while($i != 8){
    echo "<td>" .$row[$i]. "</td><td></td>";
    $i++;
    }
    echo "<tr></tr>";
  }
}

else {
  //$sqlquery = "SELECT * FROM images";
  $sqlquery = "SELECT count(*) FROM images";
  $stid = oci_parse($conn, $sqlquery);
  oci_execute($stid);
  echo "<table>";

  while($row = oci_fetch_row($stid)) {
    //echo "<tr><td> User: " . $row[1] . "&nbsp;&nbsp;&nbsp;</td><td> Subject: " . $row[3] . "&nbsp;&nbsp;&nbsp;</td><td> Date: " . $row[5] . "</td></tr>";
    echo $row[0];
  }
}
echo "</table>";
oci_close($conn);
?>

</html>

<!Collaboration with Ismail Mare>
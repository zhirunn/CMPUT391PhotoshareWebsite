<?php

  $id = $_GET['id'];
  //$type = $_GET['type'];
  $type = 'photo';

  $conn = oci_connect('wong5', 'Justin15Wong');
  $query = "SELECT photo FROM images WHERE subject = 'bob'";
  
  $stid = oci_parse($conn, $query);
  
  //oci_bind_by_name($stid, ":id", $id);
  
  
  oci_execute($stid);
  
  $row = oci_fetch_array($stid);
  $type = strtoupper($type);
  $result = $row[$type]->load();
  
  header("Content-type: image/jpeg");
  echo $result;
  
  oci_close($conn);
?>


<!http://stackoverflow.com/questions/8499633/how-to-display-base64-images-in-html>
<!http://stackoverflow.com/questions/7793009/how-to-retrieve-images-from-mysql-database-and-display-in-an-html-tag>
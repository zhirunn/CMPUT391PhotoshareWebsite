<?php
  $usern = $_SESSION["username"];
  $id = $_GET['id'];
  $type = 'thumbnail';
  $conn = oci_connect('gd1', 'N1o2t3h4i5');
  $query = "SELECT thumbnail FROM images WHERE photo_id = '$id'";
  
  $stid = oci_parse($conn, $query);
  
  //oci_bind_by_name($stid, ":id", $usern);
  
  
  oci_execute($stid);
  
  $row = oci_fetch_array($stid);
  $type = strtoupper($type);
  $result = $row[$type]->load();
  
  
  header("Content-type: image/jpeg");
  echo $result;
  
  oci_close($conn);
?>


<?php
	session_start();


	$subject = $_POST['subject'];
	$place = $_POST['place'];
  	$time = strtotime($timing); 
  	$timing = date("d/M/Y",$time);
  	$description = $_POST['description'];




?>
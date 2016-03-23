<html lang = "en">
<head>
<title>Ourwebsite.com/registerconfirm</title>
</head>
<?php
include ("PHPconnectionDB.php");
?>
<div class = "container form-register">
    
    <?php
      $user_name = $_POST['username'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $first_name = $_POST['first_name']
      $last_name = $_POST['last_name']
      $address = $_POST['address']
      $phonenum = $_POST['phone']

      $conn=connect();
      $sql="SELECT * FROM $users WHERE user_name='$user_name' and password='$password'";
      $count=mysql_num_rows($result);
      if($count==1){
      	session_register("user_name");
		    session_register("password");

    ?>
</div>
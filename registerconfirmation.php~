<html lang = "en">
<head>
<title>Ourwebsite.com/registerconfirm</title>
<script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">
</head>
<style>
  body {
    padding-top: 5%;
    padding-bottom: 5%;
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>
<html>
   <form class = "main_menu return" role = "form"
    action = "login.php" method = "post">
    <button class = "btn btn-lg btn-primary btn-block" type= "submit" name="loginscreen">Return to Login Screen</button>
  </form>

</html>


<?php
session_start();
include ("PHPconnectionDB.php");
?>
<div class = "container form-register">
    
    <?php
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $address = $_POST['address'];
      $phonenum = $_POST['phone'];

      $conn=oci_connect("wong5", "Justin15Wong");
      $sql = ("SELECT * FROM users WHERE user_name = :user_name");
      $stid = oci_parse($conn,$sql);
      //oci_bind_by_name, use this shit
      oci_bind_by_name($stid,":user_name",$user_name);
      //$res=oci_execute($stid);
      oci_execute($stid);
      $count = oci_fetch($stid);
      if ($count != false){
          $message = "That Username is taken please choose another";
          echo "<script type='text/javascript'>sweetAlert('$message');</script>";
          echo "<h1>FAILURE<h1>";
          echo "$count";
        }
     else{
        //$sqladduser = "INSERT INTO users VALUES (\".$user_name"',\'' ".$password"',\'' ".date(r)")";
        $datereg = date("d/M/Y");
        $sqladduser = ("INSERT INTO users VALUES (:user_name, :password, :datereg)");
        $stid = oci_parse($conn, $sqladduser);
        oci_bind_by_name($stid, ":user_name", $user_name);
        oci_bind_by_name($stid, ":password", $password);
        oci_bind_by_name($stid, ":datereg", $datereg);
        oci_execute($stid);
        if ($sqladduser){        
          echo "<h1>Your account is now registered!</h1>";
        }
        else{
          echo "<h1>FAILURE</h1>";
        }
        $sqladdperson = ("INSERT INTO persons VALUES (:user_name, :first_name, :last_name, :address, :email, :phonenum)");
        $stid = oci_parse($conn, $sqladdperson);
        oci_bind_by_name($stid, ":user_name", $user_name);
        oci_bind_by_name($stid, ":first_name", $first_name);
        oci_bind_by_name($stid, ":last_name", $last_name);
        oci_bind_by_name($stid, ":address", $address);
        oci_bind_by_name($stid, ":email", $email);
        oci_bind_by_name($stid, ":phonenum", $phonenum);
        oci_execute($stid);
      }
      oci_close($conn);
    ?>
</div>
<!http://blog.idojo.co/the-best-alternative-for-javascript-alert/>
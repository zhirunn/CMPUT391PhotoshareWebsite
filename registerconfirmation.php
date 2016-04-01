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

      $conn=oci_connect("gd1", "N1o2t3h4i5");
      $sql = ("SELECT * FROM users WHERE user_name = :user_name");
      $sql2 = ("SELECT * FROM persons WHERE email = :email");
      $stid = oci_parse($conn,$sql);
      $stid2 = oci_parse($conn,$sql2);
      //oci_bind_by_name, use this shit
      oci_bind_by_name($stid,":user_name",$user_name);
      oci_bind_by_name($stid2,":email",$email);
      //$res=oci_execute($stid);
      oci_execute($stid);
      oci_execute($stid2);
      $count = oci_fetch($stid);
      $count2 = oci_fetch($stid2);
      if ($count != false){
          $message = "That Username is taken. Please choose another.";
          echo "<script type='text/javascript'>sweetAlert('$message');</script>";
          echo "<h1>FAILURE<h1>";
          echo "$count";
        }
      else if ($count2 != false){
          $message = "That email is already being used. Please choose another.";
          echo "<script type='text/javascript'>sweetAlert('$message');</script>";
          echo "<h1>FAILURE<h1>";
          echo "$count2";
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
        oci_commit($conn);
      }
      oci_close($conn);

      header("Location: landing_page.php");
    ?>
</div>
<!http://blog.idojo.co/the-best-alternative-for-javascript-alert/>

<!I've determined the bug over here. Email needs to be unique.>
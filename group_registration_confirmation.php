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
    action = "group_homepage.php" method = "post">
    <button class = "btn btn-lg btn-primary btn-block" type= "submit" name="loginscreen">Return to Group Screen</button>
  </form>

</html>


<?php
  session_start();
  include ("PHPconnectionDB.php");
?>
<div class = "container form-register">
    
    <?php
      $group_name = $_POST['group_name'];

      $conn=oci_connect("gd1", "N1o2t3h4i5");
      $sql = ("SELECT * FROM groups WHERE group_name = :group_name");
      $stid = oci_parse($conn,$sql);
      //$stid2 = oci_parse($conn,$sql2);
      //oci_bind_by_name, use this shit
      oci_bind_by_name($stid,":group_name",$group_name);
      oci_execute($stid);
      $count = oci_fetch($stid);
      if ($count != false){
          $message = "That Group Name is taken. Please choose another.";
          echo "<script type='text/javascript'>sweetAlert('$message');</script>";
          echo "<h1>FAILURE<h1>";
          echo "$count";
        }
     else{
        //$sqladduser = "INSERT INTO users VALUES (\".$user_name"',\'' ".$password"',\'' ".date(r)")";
        $datereg = date("d/M/Y");
        $group_id = rand(3,100);
        $leader_name = $_SESSION['username'];
        $sqladdgroup = ("INSERT INTO groups VALUES (:group_id, :leader_name, :group_name, :datereg)");
        $stid = oci_parse($conn, $sqladdgroup);
        oci_bind_by_name($stid, ":group_id", $group_id);
        oci_bind_by_name($stid, ":leader_name", $leader_name);
        oci_bind_by_name($stid, ":group_name", $group_name);
        oci_bind_by_name($stid, ":datereg", $datereg);
        oci_execute($stid);
        if ($sqladdgroup){        
          echo "<h1>Your group is now registered!</h1>";
        }
        else{
          echo "<h1>FAILURE</h1>";
        }
      }
      oci_close($conn);

    ?>
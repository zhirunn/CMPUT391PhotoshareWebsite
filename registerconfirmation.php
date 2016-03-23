<html lang = "en">
<head>
<title>Ourwebsite.com/registerconfirm</title>
</head>
<?php
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

      $conn=connect();
      $sql="SELECT * FROM $users WHERE user_name='$user_name'";
      $count=mysql_num_rows($result);
      if ($count==1){
          echo "<p>Sorry, that username is taken. Please go back and try again.</p>";

        }
     else{
        //$sqladduser = "INSERT INTO users VALUES (\".$user_name"',\'' ".$password"',\'' ".date(r)")";
        $sqladduser = 'INSERT INTO users VALUES(\".$user_name.\',\".$password.\',\'.date(r)\')';
        if ($sqladduser){
          echo "<h1>Your account is now registered!</h1>";
        }
        else{
          echo "<h1>FAILURE</h1>";
        }
        $sqladdperson = 'INSERT INTO persons VALUES(\".$user_name.\',\".$first_name.\',\'.$last_name\',\'.$address\',\'.$email\',\'.$phonenum\')';
      }
      $conn=null;

    ?>
</div>
<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["password"]);
   
   echo 'Your session has been cleaned and you have been logged out.';
   header('Refresh: 2; URL = login.php');
?>
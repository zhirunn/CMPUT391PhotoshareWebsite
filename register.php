<html lang = "en">
<head>
<title>Ourwebsite.com/register</title>
<style>
body  {
    padding-top: 40px;
    padding-bottom: 40px;
    background-image: url("forest.jpg");
    background-size: 100% 100%;
    background-repeat: no-repeat;
    style="z-index:=-5";
}

.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
  color: #017572;
}

.form-signin .form-signin-heading,
  .form-signin .checkbox {
  margin-bottom: 10px;
}
 
.form-signin .checkbox {
  font-weight: normal;
}
 
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
 
.form-signin .form-control:focus {
  z-index: 2;
}
 
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
  border-color:#017572;
}
 
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
  border-color:#017572;
}
 
h2{
  text-align: center;
  color: #017572;
}
</style>



<h1><center>Enter A New Username and Password</center></h1>
<div class = "container form-signin">
         
<?php
   $msg = '';
   
   if (isset($_POST['login']) && !empty($_POST['username']) 
      && !empty($_POST['password'])) {
		
      if ($_POST['username'] == 'user' && 
         $_POST['password'] == '1234') {
         $_SESSION['valid'] = true;
         $_SESSION['timeout'] = time();
         $_SESSION['username'] = 'user';
         
         echo 'You have entered a valid username and password';
      }else {
         $msg = 'Wrong username or password';
      }
   }
?>
</div>

<div class = "container">

 <form class = "form-register" role = "form"
    action = "PHPexample3.php" method = "post">
    <button class = "btn btn-lg btn-primary btn-block" type= "submit" name="register">Register</button>
		
</div> 

</body>
</html>



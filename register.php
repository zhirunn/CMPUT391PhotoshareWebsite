<html lang = "en">
<head>
<title>Ourwebsite.com/register</title>

<html>
   <head><title>REGISTER NEW ACCOUNT</title></head>
   <body>
   <h1>Create a New Account</h1>
    <form id ='register' action='register.php' method='post'
    accept-charset='UTF-8' align="centre">
    First Name : <input type="text" name="first_name"/><br/>
    Last Name : <input type="text" name="last_name"/><br/>
    E-mail Address : <input type="text" name="email"/><br/>
    Address: <input type="text" name="address"/><br/>
    Phone Number: <input type="text" name="phone"/><br/>
    Username: <input type="text" name="user_name"/><br/>
    Password: <input type"text" name="password"/><br/>
    <input type="submit" name="validate" value="OK"/>
    </form>
   </body>
</html>


<div class = "container form-register">
         
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



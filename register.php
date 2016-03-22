<html lang = "en">
<head>
<title>Ourwebsite.com/register</title>

<style>
  body{
    padding-top: 5%;
    padding-bottom: 5%;
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
    style="z-index:=-5";
}
</style>

<html>
   <head><title>REGISTER NEW ACCOUNT</title></head>
   <body>
   <h1>Create a New Account</h1>
    <form id ='register' action='register.php' method='post'
    accept-charset='UTF-8'>
    First Name : <input type="text" name="first_name"/><br/>
    Last Name : <input type="text" name="last_name"/><br/>
    E-mail Address : <input type="text" name="email"/><br/>
    Address: <input type="text" name="address"/><br/>
    Phone Number: <input type="text" name="phone"/><br/>
    Username: <input type="text" name="user_name"/><br/>
    Password: <input type"text" name="password"/><br/>
    <input type="submit" name="validate" value="Register Account"/>
    </form>
   </body>
</html>
         
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

</body>
</html>



<!This really should be named with a .html extension but......>
<html lang = "en">
<head>
<title>Ourwebsite.com/register</title>
</head>
<style>
  body {
    padding-top: 5%;
    padding-bottom: 5%;
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
}</style>

<body>
    <h1>Create a New Account</h1>
    <form id ='register' action='registerconfirmation.php' method='post'
    accept-charset='UTF-8' name='registrationForm' onsubmit="return validateForm();">
    First Name : <input type="text" name="first_name"/ required><br/>
    Last Name : <input type="text" name="last_name"/ required><br/>
    E-mail Address : <input type="text" name="email"/ required><br/>
    Address: <input type="text" name="address"/ required><br/>
    Phone Number: <input type="text" name="phone"/ required><br/>
    Username: <input type="text" name="user_name"/ required><br/>
    Password: <input type= PASSWORD name="password"/ required><br/>
    Confirm Password: <input type= PASSWORD name = "passwordconfirm"/ required></br>
    <input type="submit" name="validate" value="Register Account"/>
    </form>
    <script>
        //this validates the different account things
        function validateForm() {
        var first_name = document.forms["registrationForm"]["first_name"].value;
        /***if (first_name == null || first_name == "") {
            alert("First Name must be filled out");
            return false;
        }***/
        var last_name = document.forms["registrationForm"]["last_name"].value;
        /***if (last_name == null || last_name == "") {
            alert("Last Name must be filled out");
            return false;
        }***/
        var email = document.forms["registrationForm"]["email"].value;
        /***if (email == null || email == "") {
            alert("E-mail must be filled out");
            return false;
        }***/
        var address = document.forms["registrationForm"]["address"].value;
        /***if (address == null || address == "") {
            alert("Address must be filled out");
            return false;
        }***/
        var phone = document.forms["registrationForm"]["phone"].value;
        /***if (phone == null || phone == "") {
            alert("Phone Number must be filled out");
            return false;
        }***/
        var user_name = document.forms["registrationForm"]["user_name"].value;
        /***if (user_name == null || user_name == "") {
            alert("Username must be filled out");
            return false;
        }***/
        var password = document.forms["registrationForm"]["password"].value;
        /***if (password == null || password == "") {
            alert("Password must be filled out");
            return false;
        }***/
        var confirmpassword = document.forms["registrationForm"]["confirmpassword"].value;
        /***if (confirmpassword != password || confirmpassword == "" || confirmpassword == null){
            alert("Passwords must match!")
            return false;
        }***/
    
        
    }
    </script>

</body>
         

</html>


<!This really should be named with a .html extension but......>
<html lang = "en">
<head>
    <title>Register | Photoshare</title>
    <script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <title>Login | Photoshare</title>

</head>
<style type="text/css">
    .form-field {
        clear:both;
        padding:10px;
        width:300px;
    }
    .form-field label {
        float: left;
        width: 150px;
        text-align: right;
    }

    .form-field input {
        float:right;
        width: 150px;
        text-align: left;
    }

    #submit {
        text-align: center;
    }

    body {
        background-color: #008080;
        background-size: relative;
        background-position: center;
        background-repeat: no-repeat;
    }

</style>

<body>
    <h1>Create a New Account</h1>
    <form id ='register' action='registerconfirmation.php' method='post' accept-charset='UTF-8' name='registrationForm' onsubmit="return validateForm();">
    <fielset>
        <legend>Account Information</legend>
        <div class="form-field">
            First Name : <input type= "text" name="first_name"/><br/>
        </div>
        <div class="form-field">
            Last Name : <input type= "text" name="last_name"/><br/>
        </div>
        <div class="form-field">
            E-mail Address : <input type= "text" name="email"/><br/>
        </div>
        <div class="form-field">
            Address: <input type= "text" name="address"/><br/>
        </div>
        <div class="form-field">
            Phone Number: <input type= "text" name="phone"/><br/>
        </div>
        <div class="form-field">
            Username: <input type= "text" name="user_name"/><br/>
        </div>
        <div class="form-field">
            Password: <input type= PASSWORD name="password"/><br/>
        </div>
        <div class="form-field">
            Confirm Password: <input type= PASSWORD name = "passwordconfirm"/><br/>
        </div>
        <div class="form-field">
            <input type="submit" class="btn btn-default" name="validate" value="Register Account"/>
        </div>
    </fieldset>
    </form>
    <script>
        //this validates the different account things
        //this is in javascript
        function validateForm() {
        var first_name = document.forms["registrationForm"]["first_name"].value;
        if (first_name == null || first_name == "") {
            sweetAlert("First Name must be filled out");
            return false;
        }
        var last_name = document.forms["registrationForm"]["last_name"].value;
        if (last_name == null || last_name == "") {
            sweetAlert("Last Name must be filled out");
            return false;
        }
        var email = document.forms["registrationForm"]["email"].value;
        if (email == null || email == "") {
            sweetAlert("E-mail must be filled out");
            return false;
        }
        var address = document.forms["registrationForm"]["address"].value;
        if (address == null || address == "") {
            sweetAlert("Address must be filled out");
            return false;
        }
        var phone = document.forms["registrationForm"]["phone"].value;
        if (phone == null || phone == "") {
            sweetAlert("Phone Number must be filled out");
            return false;
        }
        var user_name = document.forms["registrationForm"]["user_name"].value;
        if (user_name == null || user_name == "") {
            sweetAlert("Username must be filled out");
            return false;
        }
        var password = document.forms["registrationForm"]["password"].value;
        var confirmpassword = document.forms["registrationForm"]["confirmpassword"].value;
        if (password.value != confirmpassword.value) {
            sweetAlert("Passwords must match!")
            return false;
        }
        if (password == null || password == "") {
            sweetAlert("Password must be filled out");
            return false;
        }
    }
    </script>

</body>
         

</html>

<!http://blog.idojo.co/the-best-alternative-for-javascript-alert/>

<!notes on validation>
<!http://www.the-art-of-web.com/javascript/validate-password/>
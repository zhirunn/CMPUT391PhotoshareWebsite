<?php 
	session_start();
 ?>
 <head>
<title>Ourwebsite.com/home/groups</title>
</head>
<style>
  body {
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
}</style>

<body>
    <h1>Create a New Group</h1>
    <form id ='register' action='group_registration_confirmation.php' method='post'
    accept-charset='UTF-8' name='groupRegistrationForm' onsubmit="return validateGroupForm();">
    Group Name : <input type="text" name="group_name"/><br/>
    <input type="submit" name="validate" value="Register Group"/>
    </form>
    <script>
        //this validates the different account things
        //this is in javascript
        function validateForm() {
        var group_name = document.forms["registrationForm"]["group_name"].value;
        if (group_name == null || group_name == "") {
            sweetAlert("Group Name must be filled out");
            return false;
        }
    }
    </script>
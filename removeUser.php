<?php 
	session_start();
 ?>
<head>
    <title>Remove user | PhotoInsanity</title>

    <script src="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.rawgit.com/t4t5/sweetalert/master/dist/sweetalert.css">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<style>
  body {
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
}</style>

<body>
    <h1>Removing a friend from a group</h1>
    <form id="remove_friend" action="remove_person_confirmation.php" method="post" name="remove_friend_form" onsubmit="validateForm();">
    <fieldset>
        <legend>Person to remove</legend>
        <div class="form-field">
            Group ID: <input type="text" name="group_id"/><br/>
        </div>
        <div class="form-field">
            Friend to remove: <input type="text" name="friendtoremove"/><br/>
        </div>
        <div class="form-field">
            <input type="submit" class="btn btn-primary" name="validate" value="Remove Friend"/>
        </div>
    </fieldset>
    </form>

    <script>
    function validateForm() {
        var group_id = document.forms["remove_friend_form"]["group_id"].value;
        if (group_id == null || group_id == "") {
            sweetAlert("Group ID has to be entered");
            return false;
        }

        var friend = document.forms["remove_friend_form"]["friendtoremove"].value;
        if (friend == null || friend == "") {
            sweetAlert("Friend has to be entered");
            return false;
        }
    }

    </script>
</body>

</html>

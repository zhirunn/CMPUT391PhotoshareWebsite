<?php

/*** begin our session ***/
session_start();

/*** check if the users is already logged in ***/
if(isset( $_SESSION['user_id'] ))
{
    $message = 'Users is already logged in';
}
/*** check that both the username, password have been submitted ***/
if(!isset( $_POST['username'], $_POST['password']))
{
    $message = 'Please enter a valid username and password';
}
/*** check the username is the correct length ***/
elseif (strlen( $_POST['username']) > 20 || strlen($_POST['username']) < 4)
{
    $message = 'Incorrect Length for Username';
}
/*** check the password is the correct length ***/
elseif (strlen( $_POST['password']) > 20 || strlen($_POST['password']) < 4)
{
    $message = 'Incorrect Length for Password';
}
/*** check the username has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['username']) != true)
{
    /*** if there is no match ***/
    $message = "Username must be alpha numeric";
}
/*** check the password has only alpha numeric characters ***/
elseif (ctype_alnum($_POST['password']) != true)
{
        /*** if there is no match ***/
        $message = "Password must be alpha numeric";
}
else
{
    /*** if we are here the data is valid and we can insert it into database ***/
    $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

    /*** now we can encrypt the password ***/
    $password = sha1( $password );
    
    /*** connect to database ***/
    /*** sqlplus hostname ***/
    $sqlplus_hostname = 'localhost';

    /*** sqlplus username ***/
    $sqlplus_username = 'wong5';

    /*** sqlplus password ***/
    $sqlplus_password = 'Justin15Wong';

    /*** database name ***/
    $sqlplus_dbname = 'gwynne.cs.ualberta.ca:1521:CRS';

    try
    {
        $dbh = new PDO("sqlplus:host=$sqlplus_hostname;dbname=$sqlplus_dbname", $sqlplus_username, $sqlplus_password);
        /*** $message = a message saying we have connected ***/

        /*** set the error mode to excptions ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the select statement ***/
        $stmt = $dbh->prepare("SELECT user_id, username, password FROM users 
                    WHERE username = :username AND password = :password");

        /*** bind the parameters ***/
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR, 40);

        /*** execute the prepared statement ***/
        $stmt->execute();

        /*** check for a result ***/
        $user_id = $stmt->fetchColumn();

        /*** if we have no result then fail boat ***/
        if($user_id == false)
        {
                $message = 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION['user_id'] = $user_id;

                /*** tell the user we are logged in ***/
                $message = 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later';
    }
}
?>

<html>
<head>
<title>Login</title>
</head>
<body>
<p><?php echo $message; ?>
</body>
</html>

<!http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html>
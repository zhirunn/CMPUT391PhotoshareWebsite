<?php
session_start();


	$conn = oci_connect("wong5", "Justin15Wong");
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}

	try
	{
        $username = $_POST['username'];
        $passwordd = $_POST['passwordd'];
        $query = ("SELECT user_name, password FROM users WHERE user_name = :username AND password = :passwordd");					
        
        $stid = oci_parse($conn, $query);
        
        oci_bind_by_name($stid, ":username", $username);
        oci_bind_by_name($stid, ":passwordd", $passwordd, 40);
        
        oci_execute($stid);
        $user_name = oci_fetch($stid);
        
        if($user_name == false)
        {
                echo 'Login Failed';
                oci_close($conn);
        }
        else
        {
                $_SESSION["username"] = $user_name;
                echo 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        $message = 'We are unable to process your request. Please try again later';
    }
	
?>
<!http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html>


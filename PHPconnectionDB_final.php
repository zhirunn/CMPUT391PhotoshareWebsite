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
            $_SESSION['errors']['error5301'] = 1;
            session_write_close();
            header("Location: login_submit_final.php");

        }
        else
        {
            $_SESSION["username"] = $username;
            header("Location: landing_page.php");
        }


    }
    catch(Exception $e)
    {
        $message = 'We are unable to process your request. Please try again later';
    }
oci_close($conn);
?>
<!http://www.phpro.org/tutorials/Basic-Login-Authentication-with-PHP-and-MySQL.html>


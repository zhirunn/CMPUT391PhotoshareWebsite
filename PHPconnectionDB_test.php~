<?php
session_start();
//echo "Connected successfully";


	$conn = oci_connect("wong5", "Justin15Wong");
	if (!$conn) {
		$e = oci_error();
		trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
	//return $conn;

	try
	{
	 /*** prepare the select statement ***/
        //$stid = $conn->prepare("SELECT user_name, password FROM users 
        //            WHERE user_name = :username. AND password = :password.");
                    
        //$stid = oci_parse($conn, 'begin myproc(:username, :password); end;');
        
        $username = $_POST['username'];
        $passwordd = $_POST['passwordd'];
        //$userp = $_POST['username']; //-grabs the user inputted value for username. reference login_submit_test.php
        //$passp = $_POST['passwordd']; //-grabs the user inputted value for passwordd. reference login_submit_test.php
        //$query = ("SELECT user_name, password FROM users WHERE user_name =\''.$userp.'\' AND password =\''.$passp.'\'");        
        $query = ("SELECT user_name, password FROM users WHERE user_name = :username AND password = :passwordd");
        //-^This doesn't work because I believe sql is taking the literal values of :username and :passwordd as its search parameters.
        
        //$stid = oci_parse($conn, "SELECT user_name, password
        //							FROM users
        //							WHERE user_name = :username AND password = :passwordd");
        							
        $stid = oci_parse($conn, $query);
        
        //$array = oci_parse($c, "SELECT EMPNO,ENAME
        //                    FROM emp");
			//oci_execute($array);
			//while($row=oci_fetch_array($array))
			//{
			//echo $row[0]." ".$row[1];
			//}

        /*** bind the parameters ***/
        //oci_bind_by_name($stid, ":username", $user_name);
        //oci_bind_by_name($stid, ":passwordd", $password, 40);
        oci_bind_by_name($stid, ":username", $username);
        oci_bind_by_name($stid, ":passwordd", $passwordd, 40);
        
        //echo $userp;        
        
        /*** execute the prepared statement ***/
        oci_execute($stid);

        /*** check for a result ***/
        //$user_name = $stid->fetchColumn();
        $user_name = oci_fetch($stid);
        //print "$p2\n";   // prints 16
        
        /*** if we have no result then fail boat ***/
        if($user_name == false)
        {
                //$message = 'Login Failed';
                echo 'Login Failed';
        }
        /*** if we do have a result, all is well ***/
        else
        {
                /*** set the session user_id variable ***/
                $_SESSION["username"] = $user_name;

                /*** tell the user we are logged in ***/
                echo 'You are now logged in';
        }


    }
    catch(Exception $e)
    {
        /*** if we are here, something has gone wrong with the database ***/
        $message = 'We are unable to process your request. Please try again later';
    }
	
?>


<html>
    <body>
	<h1>Welcome to CMPUT 391</h1>
	
	<?php   // first method    	 
		if(isset($_POST['validate'])){        	
			$CCID=$_POST['ccid'];            		
			$NAME=$_POST['fullname'];
	           	echo 'Thank You !<br/> Your CCID is '.$CCID.'.<br/> Your Name is '.$NAME.'.';         
		}	
	?>

	<br/>
	
	<?php     
		// second method	 
	/*	if(isset($_POST['validate'])){        	
		       echo 'Thank You !'.'<br/>'; 
	                    foreach($_POST as $Key => $Value){
		                echo 'Your '.$Key.' is '.$Value.'<br/>';           
		         } 		
		}	
	 */?>
    </body>
</html>

<html>
  <div class="page-header">
  <h2>PhotoInsanity App</h2>
  </div>
 </html>
 <html lang = "en">
<head>
<title>Ourwebsite.com/search_result</title>

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
  integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" 
  integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

  <!-- CSS for navigation bars -->
  <link rel="stylesheet" href="include/css/nav.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
  integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

</head>
<style>
  body {
    background-color: #008080;
    background-size: relative;
    background-position: center;
    background-repeat: no-repeat;
  }
</style>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="search.php">Go Back</a></li>
        <li><a href="landing_page.php">Home Page</a></li>
        <li role="separator" class="divider"></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<?php
	session_start();

	//grab literally everything you need, username, description of pictures, the subject of picturs, place, dates given, keywords, and the serach by from the last thing. This is all used for the total query
	$user=$_SESSION['user'];
	$description=$_POST['description'];
	$subject=$_POST['subject'];
	$place=$_POST['place'];
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$keywords=$_POST['keywords'];
	$keywords=str_replace(' ', '&', $keywords);
	$searchby = $_POST['searchby'];
	$sqlsearchcheck='';

	//do a bunch of if statements to check what is what and what to add based off of the order of things you asked for THANKS HUGHBOI
	if (!empty($keywords)|| !empty($start_date) && !empty($end_date)){

		
		//check if the dates arent empty
		if(!empty($start_date)&& !empty($end_date)){
			$sqlsearchcheck .= 'i.timing between to_date( \''.$start_date.'\', \'mm/dd/yyyy\' )and to_date( \''.$end_date.'\', \'mm/dd/yyyy\' )';
		}

		//checking if the keywords arent empty
		if (!empty($keywords)){
			$sqlsearchcheck .= 'contains(i.place,\''.$keywords.'\',1)>0 or contains(i.subject,\''.$keywords.'\',2)>0 or contains (i.description,\''.$keywords.'\',3)>0';
		}

		//have to fulfill the check "are accessible to the user by the security module". ie. make it so that it if its 1. public anyone can see it, 2. make it shareable to public, 3. private to only that user, unless its to a designated group or theyre the owner 1. here
		//													2. here                                                      
		$sqlsearchcheck .= "and ((i.permitted = 1) or (i.permitted <> 1 and i.permitted <> 2 and i.permitted in (select group_id from group_lists where friend_id = \''.$user.'\' or select group_id from groups where user_name=\''.$user.'\')) or (i.permitted = 2 and i.owner_name = \''.$user.'\'))";
										        //3.above here


		//check for searchby rankings

		//oldest ranking
		if ($searchby == 'oldest'){
			$sqlsearchcheck .= "order by i.timing desc";
		}	
		//newest ranking
		else if ($searchby == 'newest'){
			$sqlsearchcheck .= "order by i.timing asc";
		}
		//normal ranking
		else{
			//grab scores for what you need, thanks hugh!
			$sqlsearchcheck .= "order_by(rank() over order_by(6*score(2)+3*score(1)+score(3)) desc";
		}

		//run after its all added up depending on what you searched for at that time
		$conn=oci_connect("wong5", "Justin15Wong");
		$sqlimagecheck=("SELECT i.photoid FROM images i WHERE ".$sqlsearchcheck);
		$stid = oci_parse($conn, $sqlimagecheck);
		$results=oci_execute($stid);

		//referenced from Example 6 in PHP Lab
		while ($row=oci_fetch_array($stid,OCI_BOTH)){
	    	$photo_display= $row['PHOTO_ID'];
	    	echo '<a href="imagegallery.php?id='.$photo_display.'"><img src="getImage.php?id='.$photo_display.'&type=thumbnail" width="175" height="200" />';
	    }
		
		// test code grab results
		/*$search_list=oci_fetch_all($stid, $results);

		//send everything to an array as you look at each value
		$search_list_to_send=array();

		foreach ($search_list as $value){
			//push this to our result list!
			array_push($search_list_to_send, $value);
		}
		//check if the images are empty or not
		if (!empty($search_list_to_send)){
			//if its empty append it to session and then send it to a showcasing thing
			$_SESSION['final_result'] = $search_list_to_send;
			//header("Location: search_result.php");
		}
	else {
		//still send it but like make a different display as a result
		$_SESSION['final_result'] = null;
		//header("Location: search_result.php");
	}
		*/
	}

?>

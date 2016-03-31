<html>
  <div class="page-header">
  <h2>PhotoInsanity App</h2>
  </div>
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
			$sqlsearchcheck.= 'i.timing between to_date( \''.$start_date.'\', 'yyyy/mm/dd'] )and to_date( \''.$end_date.'\', 'yyyy/mm/dd'] )';
		}

		//checking if the keywords arent empty
		if (!empty($keywords)){
			$sqlsearchcheck.= 'contains(i.place,\''.$keywords.'\',1)>0 or contains(i.subject,\''.$keywords.'\',2)>0 or contains (i.description,\''.$keywords.'\',3)>0';
		}

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
	

		//run after its all added up depending on what you needed at that time
		$sqlimagecheck=("SELECT i.photoid FROM images i WHERE ".$sqlsearchcheck);


	}

	else{

	}

?>

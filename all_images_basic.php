<html>
  <div class="page-header">
  <h2>PhotoInsanity App</h2>
  </div>

<?php
session_start();
?>

<!doctype html>
<html>
<head>
	<title>Search Results Gallery | PhotoInsanity</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

	<style>
  		body {
    		background-color: #008080;
    		background-size: relative;
    		background-position: center;
    		background-repeat: no-repeat;
	}</style>
</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="landing_page.php">Go Back</a></li>
        <li role="separator" class="divider"></li>
      </ul>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<body>
	<?php
	$conn = oci_connect("gd1", "N1o2t3h4i5");
	
	$username =$_SESSION['username'];
	$imageQuery = ("SELECT * FROM images");
	
	$stid = oci_parse($conn, $imageQuery);
	
	oci_execute($stid);
	

	
	//print_r($result);
	
	?>
	<?php 
		//to do under get rid of that shit plz
	?>
	<table width=\"100%\" align=\"center\" cellpadding=\"5\" cellspacing=\"5\">
	<tr align=\"center\" class=\"source1\">
	<?php
		while($result = oci_fetch_array($stid)) {
			$dis = $result['PHOTO_ID'];
			$subject = $result['SUBJECT'];
			$date_created = $result['DATE_CREATED'];
			echo "<a href='getImage.php?id=$dis'><img src='getImageThumb.php?id=$dis' /></a>";
			echo "$subject";
			echo "$date_created";
		}
	?>
		
	</tr>
   </table>
</body>

</html>
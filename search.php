<?php 
	session_start();
 ?>

<html>
<head>
  <title>Ourwebsite.com/home</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="../include/js/validDate.js" type="text/javascript"></script>
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


  <script>
    $(function() {
    $( "#datepicker_start" ).datepicker();
    $( "#datepicker_end" ).datepicker();
    });
  </script>
</head>
<style type="text/css">
    .form-field {
        clear:both;
        padding:10px;
        width:300px;
    }
    .form-field label {
        float: left;
        width: 150px;
        text-align: right;
    }

    .form-field input {
        float:right;
        width: 150px;
        text-align: left;
    }

    #submit {
        text-align: center;
    }

    body {
        background-color: #008080;
        background-size: relative;
        background-position: center;
        background-repeat: no-repeat;
    }

</style>

<body>
	<div class = "container">
    <br></br><br>
    <div class="panel panel-primary">
      <div class="panel-heading">Search For Pictures</div>
      <div class="panel-body">


  	  <form action="search_for_images.php" method="POST" name="searchform" enctype="multipart/form-data">

        <div class="form-group">
        <h1 class="form-signin-heading"></h1>
        <div class="input-group input-group-lg">
          <span class="input-group-addon">Keyword(s):&nbsp&nbsp</span>
          <input type="text" class="form-control" placeholder="Ex: greatday" name="keywords">
        </div>
      </div>
        <div class="form-group">
  		  <div class="input-group input-group-lg">
          <span class="input-group-addon">Start Date: </span>
          <input class="form-control" placeholder="Start Date (Format: MM/DD/YYYY)" id="datepicker_start" name="start_date" type="text">
          </div>
        <div class="form-group">
  		  <div class="input-group input-group-lg">
          <span class="input-group-addon">End Date: </span>
  		  <input class="form-control" id="datepicker_end" name="end_date" placeholder="End Date (Format: MM/DD/YYYY)" type="text">
  		  </div>
        
      </div>

  		  <br>
        <div class="form-group">
        <label for="searchby">Sort by:</label><br>
        	<input type="radio" name="searchby" value="oldest"> Oldest
        	<input type="radio" name="searchby" value="newest">Newest
        	<input type="radio" name="searchby" value="default" checked> None	
        </div>
        <button class="btn btn-lg btn-primary" type="submit">Search</button>
      </form>
    </div>
  </div>	
</body>
</html>

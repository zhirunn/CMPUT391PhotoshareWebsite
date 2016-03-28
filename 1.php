<html lang = 'en'>
<head>
<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev').attr('src', e.target.result).width(200).height(200);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

</script>
<meta charset=utf-8 />
<title>Ourwebsite.com</title>
<!--[if IE]>
  <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
  article, aside, figure, footer, header, hgroup, 
  menu, nav, section { display: block; }
</style>
</head>
<body>
<form method="post" action="upload.php">
  <p> Please Upload an Image: </p>
  <input type="file" name="photo" id="imgInp" onchange="readURL(this);" />
  <br/>  
  <img id="prev" src="#" alt="" />
  <p> Information: </p>
<textarea rows="10" cols="35" name="aboutMember">
</textarea>
  <br/>
  <br/>
  <input TYPE="submit" name="upload" title="Upload Image" value="Upload Image"/>
</form>
</body>
</html>

<!http://stackoverflow.com/questions/14791247/how-to-create-image-uploader-with-preview>
<!http://stackoverflow.com/questions/450876/upload-image-to-server-using-php-store-file-name-in-a-mysql-database-with-othe>
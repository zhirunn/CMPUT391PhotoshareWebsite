<html lang = 'en'>
<body>
<form method="post" action="upImg.php" enctype="multipart/form-data">
  <p>
    Please Upload a Photo in gif or jpeg format.
  </p>
  <p>
    Photo:
  </p>
  <input type="hidden" name="size" value="350000" />
  <input type="file" name="photo" id="imgInp" /> 
  <img id="prev" src="#" alt="" />
  <br/>
  <br/>
  <input TYPE="submit" name="upload" title="Upload Image" value="Upload Image"/>
</form>
<script>
function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#prev').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});
</script>
</body>
</html>
<!http://stackoverflow.com/questions/450876/upload-image-to-server-using-php-store-file-name-in-a-mysql-database-with-othe>
<!http://stackoverflow.com/questions/4459379/preview-an-image-before-it-is-uploaded>
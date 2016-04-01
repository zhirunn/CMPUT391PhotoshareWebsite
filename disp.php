<?php 


$id = $_GET['id'];

echo "<img src='getImage.php?id=$id' />";


?>

<form action="updatePhoto.php" method="post">
    <div>
        <input type="submit" class="btn btn-primary" value="Update Photo Info"/>
    </div>
</form>

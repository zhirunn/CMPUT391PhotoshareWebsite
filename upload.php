<?php
session_start();
?>

<html>
<body>

<?php
    $conn=oci_connect("gd1", "N1o2t3h4i5");
    $username = $_SESSION['username'];
    $permission = $_POST['permission'];

    $subject = $_POST['subject'];
    $place = $_POST['place'];
    $timing = $_POST['datepicker'];
    $time = strtotime($timing); 
    $timing = date("d/M/Y",$time);
    $description = $_POST['description'];
    foreach ($_FILES['photouploads']['tmp_name'] as $key => $tmp_name) {
        $photo_id = mt_rand();
        $file_name = $key.$_FILES['photouploads']['name'][$key];
        $file_size =$_FILES['photouploads']['size'][$key];
        $file_tmp =$_FILES['photouploads']['tmp_name'][$key];
        $file_type=$_FILES['photouploads']['type'][$key];
    
        $extensions = array("jpeg","jpg","gif");
        $file_ext=explode('.',$_FILES['photouploads']['name'][$key]);
        $file_ext=end($file_ext);  
        $file_ext=strtolower(end(explode('.',$_FILES['photouploads']['name'][$key])));  
        if(in_array($file_ext,$extensions ) === false){
            $errors[]="extension not allowed";
        }
        if($_FILES['photouploads']['size'][$key] > 5242880){
            $errors[]='File size must be less tham 5 MB';
        }    
    
        $percent = 0.5;
        list($width, $height) = getimagesize($tmp_name);
        $newwidth = $width * $percent;
        $newheight = $height * $percent;
        $thumbnail = imagecreatetruecolor($newwidth, $newheight);
        if ($file_ext == 'jpeg') {
            $photo = imagecreatefromjpeg($tmp_name);
        }
        else if ($file_ext == 'jpg') {
            $photo = imagecreatefromjpeg($tmp_name);      
        }
        else if ($file_ext == 'gif') {
            $photo = imagecreatefromgif($tmp_name);      
        }
        imagecopyresized($thumbnail, $photo, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
    
        ob_start();
        imagejpeg($photo);
        $contentsphoto =  ob_get_contents();
        ob_end_clean();
        $photo = $contentsphoto;
    
        ob_start();
        imagejpeg($thumbnail);
        $contentsthumbnail =  ob_get_contents();
        ob_end_clean();
        $thumbnail = $contentsthumbnail;
    
        $thumbnailblob = oci_new_descriptor($conn, OCI_D_LOB);
        $photoblob = oci_new_descriptor($conn, OCI_D_LOB);
    
        $insertquery = "INSERT INTO images VALUES (:photo_id, :username, :permission, :subject, :place, :timing, :description, empty_blob(), empty_blob() ) RETURNING thumbnail, photo INTO :thumbnail, :photo";
        $stid1 = oci_parse($conn, $insertquery);
        oci_bind_by_name($stid1, ":photo_id", $photo_id);
        oci_bind_by_name($stid1, ":username", $username);
        oci_bind_by_name($stid1, ":permission", $permission);
        oci_bind_by_name($stid1, ":subject", $subject);
        oci_bind_by_name($stid1, ":place", $place);
        oci_bind_by_name($stid1, ":timing", $timing);
        oci_bind_by_name($stid1, ":description", $description);
        oci_bind_by_name($stid1, ":thumbnail", $thumbnailblob, -1, OCI_B_BLOB);
        oci_bind_by_name($stid1, ":photo", $photoblob, -1, OCI_B_BLOB);
        oci_execute($stid1, OCI_DEFAULT);
        
        if (($thumbnailblob->save($thumbnail)) && ($photoblob->save($photo))) {
            oci_commit($conn);
        } else {
            oci_rollback($conn);
        }
    }
    oci_close($conn);
    echo 'Your image has been uploaded.';
    header('Refresh: 2; URL = landing_page.php');
 ?>

</body>
</html>
<?php
session_start();
include_once  'Db_Config.php';

$user = $_SESSION['userID'];

$target_dir = "C:/MAMP/htdocs/profilepics/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$conn = new mysqli($servername, $username, $password, $dbname);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo"file :".$file;
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.".$_SESSION['username']."shdg";        
        $file= basename( $_FILES["fileToUpload"]["name"]);
        $sqlavatar = "select max(avatarid) as id from avatar";
        $resultavatar = $conn->query($sqlavatar);        
                $rowavatar=$resultavatar->fetch_assoc();
        $avatarid = $rowavatar['id']+1;
        $sqluser="select user_id from users where user_name='".$_SESSION['username']."'";
        $resultuser = $conn->query($sqluser);        
                $rowuser=$resultuser->fetch_assoc();
        echo $rowuser['user_id'];
        $userid =$rowuser['user_id'];
        $sql = "INSERT INTO avatar (avatarid,avatar_uid,filename,filetype) VALUES ('$avatarid','$userid','$file',0)";
        $insert = mysqli_query($conn, $sql);
        echo "sql:". $sql;
        } else {
        
        echo "error:Sorry, there was an error uploading your file.";
    }
}



?>

<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 include_once 'Db_Config.php';
        $conn = new mysqli($servername, $username, $password, $dbname);

 $sqlusrid = 'select user_id from users where user_name="'.$_SESSION['username'].'"';
    $resid=$conn->query($sqlusrid);
   
$userid;
if ($resid->num_rows > 0) {
    
    while($row = $resid->fetch_assoc()) {
        echo $row['user_id'];
        $userid = $row['user_id'];
    }
}else{
    echo "No users";
}

if(isset($_FILES["file"]["type"]))
{
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 150000)
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
}
else
{
if (file_exists("upload/" . $_FILES["file"]["name"])) {
echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
}
else
{
$sourcePath = $_FILES['file']['tmp_name']; 
$targetPath = "upload/".$_FILES['file']['name']; 
move_uploaded_file($sourcePath,$targetPath) ; 
echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
    
    echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
    
     echo $_SESSION['username'];
    
    $sql1 = 'SELECT * FROM `avatar` WHERE `avatar_uid` ='.$userid.';';
    echo $sql1;
    $avatarfname=$conn->query($sql1);
    
   if ($avatarfname -> num_rows == 1) {
        
        echo "existing";
        
     $sql2='UPDATE avatar SET `filename` = "'.$_FILES['file']['name'].'" WHERE avatar_uid = "'.$userid.'"';
       echo "trying";
       $conn->query($sql2);

    }
else{
    
    echo " shud insert";
$sql3='INSERT into avatar (`avatar_uid`,`filename`,`filetype`) VALUES ('.$userid.',"'.$_FILES['file']['name'].'", 0);';
      echo $sql3;
    $conn->query($sql3);
}
    
   echo '<div><img src="'.$targetPath.'" height="50px" width="50px"></div>';
    
    echo $targetPath;
}
   
}
    
}
else
{
echo "<span id='failed'>Upload failed<span>";
}
}
?>
 
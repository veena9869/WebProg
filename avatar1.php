<?php

session_start();

	include_once 'Db_Config.php';

	$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	}  

//$sql = "SELECT * FROM users where `user_id` = '".$_POST['user_id']."'";      
$userid = $_SESSION["user_id"];  
    echo $userid;
$target_dir = "Pictures/";
$target_file = "Pictures/".basename($_FILES["avatar"]["name"]);
echo $_FILES["avatar"]["name"];

$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

echo $imageFileType;



        $DbImage = mysqli_query($conn, "UPDATE users SET Avatar = '$target_file' WHERE user_id = '$user_id';");
        
            if(!DbImage)
                {
                    echo "Could not upload";
                }
            else
                {
                    echo "successful";
                }
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) 
                {
                    echo "The file ". basename( $_FILES["avatar"]["name"]). " has been uploaded.";
                }
             else 
                {
                    echo "Sorry, there was an error uploading your file.";
                }
?>
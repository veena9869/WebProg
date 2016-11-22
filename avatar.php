<?php
			
include_once 'Db_Config.php';
              
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
$userid=$_SESSION["userID"]
				
				$msg="";
				if(isset($_POST["avatar"])){
					
					$image = $_FILES['imageToUpload']['name'];
					$target = "Pictures/".basename($_FILES["imageToUpload"]["name"]);
					$imageFileType = pathinfo($target,PATHINFO_EXTENSION);
					//echo "----------------------".$target;
					if(file_exists($target)){
						echo "Sorry, file already exists.";
					}
					if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					    echo "Only JPG, JPEG, PNG & GIF files are allowed!";
					   
					}
					if(empty($image)){
						echo "no file uploaded";
					}					
					else{
						$sqlimage = mysqli_query($connection, "UPDATE users SET `Avatar` = '$target' WHERE user_id = '$userid';");
						/*if(!sqlimage){
							echo "sql image db query failed";
						}
						else{
							echo "sql image db query success";
						}*/
						if(move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target))
						{
							$msg = "Image successfully uploaded<br><br>";
						}
						else{
							$msg = "Error in uploading image<br><br>";
						}
					}


				

	
				
				}//isset submit close


?>
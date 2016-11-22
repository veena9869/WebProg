<?php
			
				//$GLOBALS['msg']="";
				$msg="";
				if(isset($_POST["submit1"])){
					
					$image = $_FILES['imageToUpload']['name'];
					$target = "Images/".basename($_FILES["imageToUpload"]["name"]);
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
						$sqlimage = mysqli_query($connection, "UPDATE userQnA SET ProfilePic = '$target' WHERE U_id = '$userid';");
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
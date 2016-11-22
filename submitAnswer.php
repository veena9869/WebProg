<?php
	session_start();

	include_once 'Db_Config.php';
	
	$questionID=$_GET['askerID']; 
	$aRating = 0;         
    $aID = $_SESSION['questionNum'];
    $ans=htmlentities($_POST[answer]);
					
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO answer (a_id,a_asker,  a_content)
			VALUES ('$aID','$_SESSION[username]',  '$ans')";
					
	if (isset($_POST['submit']))
	{	
		if ($conn->query($sql) === TRUE) 
			{
            //echo "answer=".$ans;
				header("Location: index.php");
            }
		else 
			{
				echo "Error: " . $sql . "<br>" . $conn1->error;
			}					    
	}
?>
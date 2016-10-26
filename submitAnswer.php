<?php
	echo '<link href="/css/bootstrap.min.css" rel="stylesheet">';
	session_start();

	include_once 'Db_Config.php';
	
	$questionID=$_GET['askerID']; 
	$aRating = 0;         
    $aID = $_SESSION['questionNum'];
					
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO answer (a_id,a_asker,  a_content)
			VALUES ('$aID','$_SESSION[username]',  '$_POST[answer]')";
					
	if (isset($_POST['submit']))
	{	
		if ($conn->query($sql) === TRUE) 
			{
				header("Location: index.php");
            }
		else 
			{
				echo "Error: " . $sql . "<br>" . $conn1->error;
			}					    
	}
?>
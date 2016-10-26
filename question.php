<?php
	
	
	session_start();
	include_once 'Db_Config.php';

	$conn0 = new mysqli($servername, $username, $password, $dbname);
	
	$conn1 = new mysqli($servername, $username, $password, $dbname);
			$sql1 = "INSERT INTO question (q_asker,q_title, q_content)
					VALUES ('$_SESSION[username]','$_POST[title]', '$_POST[content]')";

	if ($conn1->query($sql1) === TRUE) 
		{
			header("Location: index.php");
		} 
	else 
		{
			echo "Error: " . $sql1 . "<br>" . $conn1->error;
		}

	$conn1->close();
?>


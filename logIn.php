<?php
	session_start();

	include_once 'Db_Config.php';

	$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM users where `user_name` = '".$_POST['uname']."'and `user_pw` = '".$_POST['pword']."'";
$pwd1=$_POST["pword"];

	$result = $conn->query($sql);
    
if($_POST["login-submit"])  
	{ 
		if ( $result-> num_rows >0) 
		{
					$_SESSION['username'] = $_POST["uname"];
					$_SESSION['userID'] = $row["user_id"];
					$_SESSION['logged_in'] = 1;					
					$_SESSION['vote'] = array();
					$_SESSION['Qvote'] = array();
					header ("Location: index.php");				
		} 
		else 
		{
			echo "0 results";
		}
		mysqli_close($conn);
    }
	else
	{
        echo "Login Failed";
	}
    
?>
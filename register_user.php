<?php
	session_start();

	include_once 'Db_Config.php';

	$conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	

    $sql = "SELECT user_name FROM users";
    $result = $conn->query($sql);
    $flag = 0;
            

	if ($result -> num_rows > 0)
	{
		while($row = $result -> fetch_assoc())
		{
           	if (strcmp($_POST["user_name"],$row["user_name"]) == 0)
			{
				$flag  = 1;
                break;

			}
		}
	}
	else
	{
		echo "0 results";
	}
   
    if ($flag == 0)
	{
		echo "Username is unique<br>";
		$sql1 = "INSERT INTO users (user_name,user_pw)
			 VALUES ('$_POST[user_name]','$_POST[user_pw]')";
		if ($conn->query($sql1) === TRUE)
		{
            $sql2 = "SELECT * FROM users where `user_name` = '".$_POST['user_name']."'and `user_pw` = '".$_POST['user_pw']."'";

	$result2 = $conn->query($sql2);
              
            if($_POST["register_submit"])  
		      {
                if ( $result2-> num_rows >0) 
		          {
					$_SESSION['username'] = $_POST["user_name"];
					$_SESSION['userID'] = $row["user_id"];
					$_SESSION['logged_in'] = 1;
					$_SESSION['vote'] = array();
					$_SESSION['Qvote'] = array();
					header ("Location: index.php");			
		          } 
                }           
		  }
		else
		  {
			echo '<p>Registration failed!</p>
					<form action=index.php>
						<input type="submit" value="Home">
					</form>';
		  }
	}
	else
	{
        echo '	<p>Username is not unique. Select a different name.</p>
				<form action=index.php>
					<input type="submit" value="Home">
				</form>
			';
	}
?>
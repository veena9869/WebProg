<?php
	include_once 'Db_Config.php';
session_start();

$secret="6LfdOQ4UAAAAAJ6flcMP2BLbptA28Tf_LiM2CeVt";
$response=$_POST["g-recaptcha-response"];
$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}");
$captcha_success=json_decode($verify);

if ($captcha_success->success==true) {
    
  $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) 
	{
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT * FROM users where `user_name` = '".$_POST['uname']."'and `user_pw` = '".$_POST['pword']."'";
  
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
    
    }
else if ($captcha_success->success==false) {      
    echo '
    <script>
    alert("You forgot to check the Captcha");
    window.location.href="loginform.php";
    </script>
    ';
   
}   
?>
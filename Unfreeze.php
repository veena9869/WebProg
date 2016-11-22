<?php
  
  include_once "Db_Config.php";
  session_start();
	//$_SESSION['questionNum'] =$_GET['varqid'];
  $url = "Admin.php";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
	$sql = "UPDATE question
			 SET freeze = 0
        WHERE q_id = ".$_GET['var'];

  $conn->query($sql);
      header("Location: $url");
      unset($_SESSION['questionNum']);
	  mysqli_close($conn);
    die();
?>


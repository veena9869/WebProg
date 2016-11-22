<?php
  
  include_once "Db_Config.php";
  session_start();
	
  $url = "answersdisplay.php?var=" . intval($_SESSION['questionNum']);
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  $conn1 = new mysqli($servername, $username, $password, $dbname);
	$sql1 = "UPDATE answer
			 SET a_best = 0
       WHERE a_id = '".$_SESSION['questionNum']."'";

  $conn->query($sql1);
  echo $sql1;
	$sql2 = "UPDATE answer
			 SET a_best = 1
        WHERE a_order = '$_POST[id]'";

  $conn1->query($sql2);
  echo $sql2;
      header("Location: $url");
       unset($_SESSION['questionNum']);
	  mysqli_close($conn);
    die();
?>


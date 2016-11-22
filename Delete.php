
<?php
  
  include_once "Db_Config.php";
  session_start();
	//$_SESSION['questionNum'] =$_GET['varqid'];
  $url = "Admin.php";
  
  $conn = new mysqli($servername, $username, $password, $dbname);
  
	$sql = "DELETE from question WHERE q_id = ".$_GET['var'];
    $sql1 = "DELETE from question_votes WHERE qv_qid = ".$_GET['var'];
    $sql2 = "DELETE from answer WHERE a_id = ".$_GET['var'];
    $sql3 = "DELETE from answer_votes WHERE v_aorder = (select a_order from answer where a_id =".$_GET['var'].")";
  $conn->query($sql);
$conn->query($sql1);
$conn->query($sql2);
$conn->query($sql3);
      header("Location: $url");
      unset($_SESSION['questionNum']);
	  mysqli_close($conn);
    die();
?>


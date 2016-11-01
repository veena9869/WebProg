<?php
  
  include_once "Db_Config.php";
  session_start();
	
$conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
$sqlvote = "select * from question_votes where qv_uid= '$_POST[uid]'and qv_aorder ='$_POST[id]'";
$resultvote = mysqli_query( $conn2,$sqlvote);
$rowvote = mysqli_fetch_assoc($resultvote);
$voteup=1;
$votedown=0;
$sql1 = "UPDATE question
			 SET q_value = q_value + 1
       WHERE q_id = '$_POST[id]'";
$sql2 = "UPDATE question
			 SET q_value = q_value - 1
       WHERE q_id = '$_POST[id]'";
$sql3 = "INSERT INTO question_votes (qv_aorder,qv_uid,  qv_vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$voteup')";
$sql4 = "INSERT INTO question_votes (qv_aorder,qv_uid,  qv_vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$votedown')";

  $postId = $_POST['id'];

    if(isset($_POST['up']) )
    {if(is_null($rowvote['qvid']))
    {
      $conn->query($sql1);
      $conn1->query($sql3);
      header("Location: Questions.php");
    }
     else
         header("Location: Questions.php");
    }
    else if(isset($_POST['down']))
    {
        if(is_null($rowvote['qvid']))
    {
      $conn->query($sql2);
      $conn1->query($sql4);
      header("Location: Questions.php"); 
    }
     else
         header("Location: Questions.php");
    }
    else
    {
      header("Location: Questions.php");
    }
    
    unset($_SESSION['questionNum']);
    mysqli_close($conn);
    die();         

?>


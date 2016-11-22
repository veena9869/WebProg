<?php
  
  include_once "Db_Config.php";
  session_start();
	
  //$url = "answersdisplay.php?var=" . intval($_SESSION['questionNum']);
  
  $conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
$sqlvote = "select * from question_votes where qv_uid= '$_POST[uid]'and qv_qid ='$_POST[id]'";
$resultvote = mysqli_query( $conn2,$sqlvote);
$rowvote = mysqli_fetch_assoc($resultvote);
$voteup=1;
$votedown=0;
$asker=$_POST[asker];
$sql='select * from users where user_name="'.$asker.'"';
$resultasker = $conn->query($sql);
        $rowasker = mysqli_fetch_array($resultasker);
$askerid=$rowasker['user_id'];

$sql1 = "UPDATE question
			 SET q_value = q_value + 1
       WHERE q_id = '$_POST[id]'";
$sql2 = "UPDATE question
			 SET q_value = q_value - 1
       WHERE q_id = '$_POST[id]'";
$sql3 = "INSERT INTO question_votes (qv_qid,qv_uid,  qv_vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$voteup')";
$sql4 = "INSERT INTO question_votes (qv_qid,qv_uid,  qv_vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$votedown')";
$sql5 = 'UPDATE users set score=score+1 where user_id='.$askerid;
$sql6 = 'UPDATE users set score=score-1 where user_id='.$askerid; 


echo "sql5=".$sql5;
echo "  sql6=".$sql6;
  $postId = $_POST['id'];

    if(isset($_POST['up']) )
    {if(is_null($rowvote['qvid']))
    {
        $conn->query($sql5);
      $conn->query($sql1);
      $conn1->query($sql3);
        $_SESSION['vote'][$postId] = 1;
      
    }
     
    }

    else if(isset($_POST['down']))
    {
        if(is_null($rowvote['qvid']))
    {
        $conn->query($sql6);
        echo "success";
      $conn->query($sql2);
      $conn1->query($sql4);
        $_SESSION['vote'][$postId] = 1;
       
    }
    }
$sql7 = 'select * from users where user_id='.$askerid;
$resultasker1 = $conn->query($sql7);
        $rowasker1 = mysqli_fetch_array($resultasker1);
$askerscore=$rowasker1['score'];
$sql8 = 'UPDATE question
			 SET asker_score = '.$askerscore.'
       WHERE q_asker="'.$asker.'"';
$sql9 = 'UPDATE answer
			 SET a_asker_score = '.$askerscore.'
       WHERE a_asker="'.$asker.'"';
$conn->query($sql8);
$conn->query($sql9);
//echo $askerscore;
    header("Location: Questions.php");
    
    unset($_SESSION['questionNum']);
	  mysqli_close($conn);
    die();

              

?>


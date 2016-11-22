<?php
  
  include_once "Db_Config.php";
  session_start();
	
  $url = "answersdisplay.php?var=" . intval($_SESSION['questionNum']);
  
  $conn = new mysqli($servername, $username, $password, $dbname);
$conn1 = new mysqli($servername, $username, $password, $dbname);
$conn2 = new mysqli($servername, $username, $password, $dbname);
$sqlvote = "select * from answer_votes where v_uid= '$_POST[uid]'and v_aorder ='$_POST[id]'";
$resultvote = mysqli_query( $conn2,$sqlvote);
$rowvote = mysqli_fetch_assoc($resultvote);
$voteup=1;
$votedown=0;
$sql1 = "UPDATE answer
			 SET a_rating = a_rating + 1
       WHERE a_order = '$_POST[id]'";
$sql2 = "UPDATE answer
			 SET a_rating = a_rating - 1
       WHERE a_order = '$_POST[id]'";
$sql3 = "INSERT INTO answer_votes (v_aorder,v_uid,  vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$voteup')";
$sql4 = "INSERT INTO answer_votes (v_aorder,v_uid,  vote)
			VALUES ('$_POST[id]','$_POST[uid]',  '$votedown')";

  $postId = $_POST['id'];

    if(isset($_POST['up']) )
    {if(is_null($rowvote['vid']))
    {
      $conn->query($sql1);
        $conn1->query($sql3);
      $_SESSION['vote'][$postId] = 1;
      header("Location: $url");
    }
     else
         header("Location: $url");
    }

    if(isset($_POST['down']))
    {
        if(is_null($rowvote['vid']))
    {
      $conn->query($sql2);
        $conn1->query($sql4);
      $_SESSION['vote'][$postId] = 1;
      header("Location: $url");
    }
     else
         header("Location: $url");
    }

    else
    {
        //echo $rateup."hasgd".$sql1."hasgd".$sql2;
      header("Location: $url");
    }
    
    unset($_SESSION['questionNum']);
	  mysqli_close($conn);
    die();

              

?>


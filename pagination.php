<?php
$page=($_GET['var']-1)*10;

require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
$bbcode = new BBCode;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
error_reporting(0);
?>

<!DOCTYPE html>
<html>
<html lang="en">
<head>
  <title>Milestone 1</title>
  <meta charset="utf-8">
  <meta http-eqiuv="XUA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,intitail-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  <link href="login.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
  
<body>
<div class="container">
  <div class="jumbotron">
    <h1>Thrones Realm</h1>
    <p> Welcome to world of Game of Thrones. Post your Questions here!</p>
  
    <div class="container"><?php
         if(!$_SESSION['logged_in']){
      echo'<a href="loginform.php"><button type="button" class="btn btn-success">Login or Register</button></a>';
        }?>
      <a href="index.php"><button type="button" class="btn btn-danger">Home</button></a>
      <a href="Questions.php"><button type="button" class="btn btn-primary">Questions</button></a>
        <a href="SubmitQuest.php"><button type="button" class="btn btn-success">Post a Question</button></a>
        <a href="Profile.php"><button type="button" class="btn btn-primary">Profile</button></a>
        <a href="help.php"><button type="button" class="btn btn-primary">Help</button></a>
        <?php 
        include_once 'Db_Config.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sqladmin = 'select admin from users where user_name="'.$_SESSION['username'].'"';
        $resultadmin = $conn->query($sqladmin);
        $rowadmin = mysqli_fetch_array($resultadmin);
        
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
        if($rowadmin['admin']==1){?>
        <a href="Admin.php"><button type="button" class="btn btn-primary">Admin</button></a>
        
        <?php }?>
        <button type="button" class="btn btn-warning">Votes</button> <br><br> 
        
        <?php
        if($_SESSION['logged_in'])
        {
            echo 'Welcome ' . $_SESSION['username'] .', <a href="Logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
        
        echo '<div class="pull-right">
        
      </div>';
        }
        ?>
        
      </div>
      </div>
   </div>


        <div class="col-md-6">
            
            <?php          
              
              $sqlquestions ="Select count(*) as questioncount from question";
              
            $resultquestions = $conn->query($sqlquestions);
            $rowquestions = mysqli_fetch_array($resultquestions);
            $questioncount=$rowquestions['questioncount']/2;
            
            
            while( $i<$questioncount)
            {
                $i=$i+1;
               echo' <ul class="pagination">
    <li><a href="pagination.php? var='.$i.'">'.$i.'</a></li>    
  </ul>';
                
            }
            echo "page=".$page;
$sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT ".$page.",2";
            $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result))
                {  
                  $sqlans="Select count(*) as anscount from answer where a_id=".$row['q_id'];
                  $resultans = $conn->query($sqlans);
            $rowans = mysqli_fetch_array($resultans);
            $anscount=$rowans['anscount'];
                  //echo "anscount=".$anscount;
                  if($anscount%2==0)
                  {
                      $anscount=$anscount/2;
                  }
                  else
                  {
                      $anscount=($anscount+1)/2;
                  }
                  echo'<div class="container" >
                    <div class="well" style ="color:green">
                        <div class="Question" >
                            <div class="votes" >
                                <div class="views" >
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . 
                      html_entity_decode($bbcode->Parse($row['q_title'])) .
                                    '</a> <br>' . $row['q_asker'] . ' <br>User Score: '.$row['asker_score'].'
                                </div>';
                  $ip=0;
                                while( $ip<$anscount){
                                    $ip=$ip+1;
                                    echo' <ul class="pagination">
                                    <li><a href="anspagin.php? var1='.$ip.'&var='.$row['q_id'].'">'.$ip.'</a></li>    
                                    </ul>';
                                    }
                           echo'
                            </div>
                        </div>
                        </div>
                    </div> '; 
                }
            mysqli_close($conn);
            ?>
        </div>
</body>
</html>
<?php


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
  
<?php
    include_once 'nav.php';?>
<style>
div.container {margin-top: 4.5em !important;}
</style>    

<body>
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
        
        <div class="col-md-6">
            
            <?php          
              
              $sqlquestions ="Select count(*) as questioncount from question";
              
            $resultquestions = $conn->query($sqlquestions);
            $rowquestions = mysqli_fetch_array($resultquestions);
            $questioncount=$rowquestions['questioncount']/2;
            
            
            
            while( $i<$questioncount)
            {
                $i=$i+1;
               echo' <ul class="pagination" style="margin-top:6em;">
    <li><a href="pagination.php? var='.$i.'">'.$i.'</a></li>    
  </ul>';
                
            }
            $page=($_GET['var']-1)*2;
$sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT ".$page.",2";
            $result = $conn->query($sql);
              while($row = mysqli_fetch_array($result))
                {   $sql1= "select * from users where user_name='".$row['q_asker']."'";
                  $result1= $conn->query($sql1);
                  $user = mysqli_fetch_array($result1);
                  $sql2="select * from avatar where avatar_uid=".$user['user_id'];
                  $result2= $conn->query($sql2);
                  $avatar = mysqli_fetch_array($result2);
                  $path = "http://vtalapaneni.cs518.cs.odu.edu/upload/".$avatar['filename'];
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
                                <div class="media-left">
                                     <img src="'.$path.'" class="media-object" style="width:60px">
                                      </div>
                                <div class="media-body">
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . 
                      html_entity_decode($bbcode->Parse($row['q_title'])) .
                                    '</a> <br>' . $row['q_asker'] . ' <br>User Score: '.$row['asker_score'].'';$tags= $row['tags'];
                                    $newtags=explode("#",$tags);
                                    $tagcount=count($newtags);
                  
                  if($tagcount!=1){
                                    while ($tagcount!=0)
                                    {
                                        $tagcount=$tagcount-1;
                                        echo '<button style ="margin:10px;height:25px;width:40px;background-color:green;border:none;text-align:center;cursor:pointer;border-radius: 8px;"> <a href ="tags.php? var='.$newtags[$tagcount].'" style="color:white">'.$newtags[$tagcount].'</a></button>';
                                    }
                                        
                  }
                 echo '</div>
                                <hr>
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
    <?php
    include_once 'footer.php';?>  
</html>
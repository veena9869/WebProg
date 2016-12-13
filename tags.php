<?php
$tag=$_GET['var'];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
error_reporting(0);

require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
$bbcode = new BBCode;
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
       ?>
        <button type="button" class="btn btn-warning">Votes</button> <br><br> 
        
        <div class="col-md-6">
            
            <?php              
              
              $sqlquestions ="Select count(*) as questioncount from question";
              
            $resultquestions = $conn->query($sqlquestions);
            $rowquestions = mysqli_fetch_array($resultquestions);
            $questioncount=$rowquestions['questioncount']/2;
            $page=0;
            
            $sql = 'SELECT *  FROM question where tags like "%'.$tag.'%" ORDER BY q_value DESC ';
            $result = $conn->query($sql);
            
              while($row = mysqli_fetch_array($result))
                {  
                  $sqlans="Select count(*) as anscount from answer where a_id=".$row['q_id'];
                  $resultans = $conn->query($sqlans);
            $rowans = mysqli_fetch_array($resultans);
            $anscount=$rowans['anscount'];
                 // echo "anscount=".$anscount;
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
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . html_entity_decode($bbcode->Parse($row['q_title'] )).
                                    '</a> <br>' . $row['q_asker'] . ' Score:'.html_entity_decode($bbcode->Parse($row['q_value'])) . '<br><br>';
                                    $tags= $row['tags'];
                                    $newtags=explode("#",$tags);
                                    $tagcount=count($newtags);
                  
                  if($tagcount!=1){
                                    while ($tagcount!=0)
                                    {
                                        $tagcount=$tagcount-1;
                                        echo '<button style ="margin:10px;height:25px;width:40px;background-color:green;border:none;text-align:center;cursor:pointer;border-radius: 8px;"> <a href ="tags.php? var='.$newtags[$tagcount].'" style="color:white">'.$newtags[$tagcount].'</a></button>';
                                    }
                  }
                            echo    '</div>';
                  $ip=0;
                                while( $ip<$anscount){
                                    $ip=$ip+1;
                                    echo' <ul class="pagination">
                                    <li><a href="anspagin.php? var1='.$ip.'&var='.$row['q_id'].'">'.$ip.'</a></li>    
                                    </ul>';
                                    }
                           echo' </div>
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
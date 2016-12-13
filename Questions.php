<?php
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
        
        <div class="col-md-6">
            
            <div id="searchresult" class="style:left">
        <form class="searchform" action="Search1.php" method="post">
                    <input  type="search" name="searchstr" id="searchstr" onKeyUp="showResult(this.value)" placeholder="Search user"/>
                    <button type="submit" id="searchsubmit">Search</button>
                </form>
        </div>

<script type="text/javascript">
function showResult(str) {
var entered = $("#searchstr").val();
var res = 'searchstr='+ entered ;

if (entered != '') {

  $.ajax({
  type: "POST",
  url: "Search1.php",
  data: res,
  cache: false,
  success: function(result){
  $("#searchresult").empty();
  $("#searchresult").append(result);
  }
  });
} else {
  $("#searchresult").append("<p>No results");
  $("#searchresult").empty();
}
} 
</script>
            
            
            
            
            
            
            
            <?php              
              
              $sqlquestions ="Select count(*) as questioncount from question";
              
            $resultquestions = $conn->query($sqlquestions);
            $rowquestions = mysqli_fetch_array($resultquestions);
            $questioncount=$rowquestions['questioncount']/2;
            $page=0;
            //echo "rowquestions :".$rowquestions['questioncount']/2;
            
            while( $i<$questioncount)
            {
                $i=$i+1;
               echo' <ul class="pagination">
    <li><a href="pagination.php? var='.$i.'">'.$i.'</a></li>    
  </ul>';
                
            }
            $sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT ".$page.",2";
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
                                
                                <div class="media-left">
                                    <img src="profilepics/2.jpg" class="media-object" style="width:60px">
                                </div>
                                <div class="media-body">
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . html_entity_decode($bbcode->Parse($row['q_title'] )).
                                    '</a> <br>' . $row['q_asker'] . ' <br> User Score: '.$row['asker_score'].'
                                </div>
                                <hr>
                                </div>';
                    
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
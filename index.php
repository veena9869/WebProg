<?php
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
  
    <div class="container">
        <?php 
        include_once 'Db_Config.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sqladmin = 'select admin from users where user_name="'.$_SESSION['username'].'"';
        $resultadmin = $conn->query($sqladmin);
        $rowadmin = mysqli_fetch_array($resultadmin);
        
        $sqlusrname = 'select user_score from users where user_name="'.$_SESSION['username'].'"';
            $resultusrname = $conn->query($sqlusrname);
            //echo $resultusrname;
        
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
        if($rowadmin['admin']==1){?>
        <a href="Admin.php"><button type="button" class="btn btn-primary">Admin</button></a>
        
        <?php }?>
        <div id="searchresult"></div>

<script type="text/javascript">
function showResult(str) {
var entered = $("#searchstr").val();
var res = 'searchstr='+ entered ;

if (entered != '') {

  $.ajax({
  type: "POST",
  url: "Search.php",
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
        
      </div>
           <div class="col-md-6">
            
            <?php

              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT 5";
              $result = $conn->query($sql);
               // $row1=mysqli_fetch_array($result);
        
              while($row = mysqli_fetch_array($result))
                {  
                  echo'<div class="container" >
                    <div class="well" style ="color:green">
                        <div class="Question" >
                            <div class="votes" >
                                <div class="views" >
                                     <div class="media">
                                        <div class="media-left">
                                          <img src="profilepics/2.jpg" class="media-object" style="width:60px">
                                                </div>
                                                <div class="media-body">
                                                  <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . $row['q_title'] .'</a> <br>' . $row['q_asker'] . ' User Score: '.$row['asker_score'].'
                                                </div>
                                        </div>
                                      <hr>
                                </div>
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
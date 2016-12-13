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
        
       <!-- <a href="Profile.php?var='.$_SESSION['username'].'">Profile</a>-->
       <!-- <a href="Profile.php"><button type="button" class="btn btn-primary">Profile</button></a>-->
        <a href="help.php"><button type="button" class="btn btn-primary">Help</button></a>
        
        <a href="demo.php">Github login</a>
       
       
         

        
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
        
        
        <?php
        if($_SESSION['logged_in'])
        {
            echo 'Welcome ' . $_SESSION['username'] .', <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
            
            echo "Score is:";
            echo  $_SESSION['userscore'];
            
        echo '<div class="pull-right">
        
      </div>';
         echo '<a href="Profile.php?var='.$_SESSION['username'].'">Profile</a>';  
            
             echo '<a href="main.php?var='.$_SESSION['username'].'">Actual Profile</a>';
            
        }        
        ?>
        <form class="searchform" action="Search.php" method="post">
                    <input  type="search" name="searchstr" id="searchstr" onKeyUp="showResult(this.value)" placeholder="Search user"/>
                    <button type="submit" id="searchsubmit">Search</button>
                </form>
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
      </div>
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
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . $row['q_title'] .
                                    '</a> <br>' . $row['q_asker'] . ' User Score: '.$row['asker_score'].'
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
</html>

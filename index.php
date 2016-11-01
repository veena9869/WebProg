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
        <a href="Profile.php"><button type="button" class="btn btn-primary">Profile</button></a>
        
        
        <button type="button" class="btn btn-warning">Votes</button> <br><br> 
        
        <?php
        if($_SESSION['logged_in'])
        {
            echo 'Welcome ' . $_SESSION['username'] .', <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
        
        echo '<div class="pull-right">
        <a href="avatar1.php"><input type="file" name="avatar" id="avatar" accept="image/*"><button type="Submit"  class="btn btn-info"> Submit</button></a>
      </div>';
        }
        ?>
        
      </div>
      </div>
   </div>


        <div class="col-md-6">
            <?php

              include_once 'Db_Config.php';
              
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT 5";
              $result = $conn->query($sql);

              while($row = mysqli_fetch_array($result))
                {  
                  echo'<div class="container" >
                    <div class="well" style ="color:green">
                        <div class="Question" >
                            <div class="votes" >
                                <div class="views" >
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . $row['q_title'] .
                                    '</a> ' . $row['q_asker'] . ' '. $row['q_value'] . '
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
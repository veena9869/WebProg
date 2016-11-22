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
    
  <title>Milestone 3</title>
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
        
        
        
        
        <?php
        if($_SESSION['logged_in'])
        {
            echo 'Welcome ' . $_SESSION['username'] .', <a href="Logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
             //echo $_SESSION['userscore'];
        echo '<div class="pull-right">
        
      </div>';
         echo '<a href="Profile.php?var=' . $_SESSION['username'] . '"></a>';            
        }        
        ?>
        
      </div>
      </div>
   </div>
    
    <div class="container">
            <div class="row row-header">
                <div class="col-md-12">
                    <p style="padding:40px;"></p>
                    <h4><b>Thrones Realm</b> is a question and answer site for people interested in watching Game of Thrones. It's built and run by you as part of the knowledge exchange network of Q and A sites. With your help, we're working together to build a library of detailed answers to every question about thrones .
                        <i>We're a little bit different from other sites. Here's how:</i></h4>
                </div>
            </div>
        </div>
    
    
    <div class="container">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>                
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>Ask questions, get answers, no distractions</h2>
                <p>This site is all about getting answers. It's not a discussion forum. There's no chit-chat. </p>
                <i> You are welcome to ask any Questions related to Game of Thrones</i>
                <p><a  href="help.php">More &raquo;</a></p>
            </div>
        </div>
    </div>
    
     <div class="container">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <ul>
                    <li><p align=center>Question? </p></li>
                    <li><p align=center>Vote Questions and Answers</p></li>
                    <li><p align=center>Reply to Questions and Answers posted </p></li>
                </ul>
            </div>
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>Applications</h2>
                <p>You can make use of this website in various ways. You can post a Question or reply to any question provided in the website. A user will be able Up vote or Down vote the answers for the Questions posted. Also, The user whoever has posted the Question will be able to choose the right answer. If it is the correct answer then the score of the user increments. Some of the important features are listed in the right side menu bar. </p>
                <p><a  href="#">More &raquo;</a></p>
            </div>
        </div>
    </div>
    
    <div class="container">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <ul>
                    <li><p align=center>Monica, Backend Programmer </p></li>
                    <li><p align=center>Anusha, Database Builder </p></li>
                    <li><p align=center>Veena, Front-End Developer </p></li>
                </ul>
                
            </div>
            
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>About Us</h2>
                <p>Developers trust Thrones Realm to help solve doubts and use Thrones website to discuss about their favourite characters. We’re committed to making the internet a better place, and our products aim to enrich the lives of developers as they grow and mature in their careers.Founded in 2008, Stack Overflow sees 40 million visitors each month and is the flagship site of the Stack Exchange network, home to 150+ Q&A sites dedicated to niche topics.</p>
                <p><a  href="#">More &raquo;</a></p>
            </div>
        </div>
    </div>
    
    
     <div class="container">
        <div class="row row-content">
            <div class="col-xs-12 col-sm-3 col-sm-push-9">
                <p style="padding:20px;"></p>
                <ul>
                    <li><p align=center>Monica, mmar001@odu.edu </p></li>
                    <li><p align=center>Anusha, akuna001@odu.edu </p></li>
                    <li><p align=center>Veena, vtala001@odu.edu </p></li>
                </ul>
                
            </div>
            
            <div class="col-xs-12 col-sm-9 col-sm-pull-3">
                <h2>Email Us</h2>
                <p>If you need any help you can directly contact us at following email address.</p>
                <p><a  href="#">More &raquo;</a></p>
            </div>
        </div>
    </div>
    
    
    
    
    
    
    
    
    
    
    
    </body>
    </html>

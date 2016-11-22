<!DOCTYPE>
<html>
<head>
    <title>Thrones Realm</title>
    <link href="main.css" rel="stylesheet">
    <meta http-eqiuv="XUA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,intitail-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="//cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>
</head>
    
<body>
    
    <div class="container">
  <div class="jumbotron">
    <h1>Thrones Realm</h1>
    <p> Welcome to world of Game of Thrones. Post your Questions here!</p>
  
    <div class="container">
      <a href="loginform.php"><button type="button" class="btn btn-success">Login or Register</button></a>
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
      </div>
        </div>
    </div>
    
    <?php
    
    session_start();
    error_reporting(0);

	
	if ($conn->connect_error)
    {
		die("Connection failed: " . $conn->connect_error);
	}
    if($_SESSION['logged_in'] == 0)
{
    
    echo '
            <div class="row">
            <p>Please <a href="login.php">Login</a> to ask a question</p>
          </div>';
}
   else
   {
    
           echo '
           <div class="container">
           <div class="quest-area">
           <form class="quest-form" action="quest.php" method="post">
           <b>Title</b><br><textarea rows="3" cols="150" name="title">
           </textarea><br><br>
           <b>Description</b><br><textarea rows="10" cols="150" name="content" id="input"></textarea>
           <br><br>
           <input type="submit" value="Submit">
           </form>
           </div>
           </div>
           ';
       }
   
    

    ?>
    <script>CKEDITOR.replace( 'input');</script>
    </body>


</html>
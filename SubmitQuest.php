<!DOCTYPE>
<html>
<head>
    <title>Thrones Realm</title>
    <link href="main.css" rel="stylesheet">
    </head>
<body>
    <div class="container">
    
<div class="navigation-elements">
        <a href="index.php"><button class="button">Home</button></a>
        <a href="Login.php"><button class="button">Login</button></a>
        <a href="Questions.php"><button class="button">Questions</button></a>
        </div>
        <br>
        <div id="title-id">
        <h1>Thrones Realm
            </h1></div>
    
    
    <?php
    
    session_start();
    error_reporting(0);

    include_once "Db_Config.php";

	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error)
    {
		die("Connection failed: " . $conn->connect_error);
	}
    if($_SESSION['logged_in'] == 0)
{
    
    echo '<div class="row">
            <p>Please <a href="login.php">Login</a> to ask a question</p>
          </div>';
}
   else
   {
    
           echo '<div class="quest-area">
           <form class="quest-form" action="quest.php" method="post">
           <b>Title</b><br><textarea rows="3" cols="150" name="title">
           </textarea><br><br>
           <b>Description</b><br><textarea rows="10" cols="150" name="content"></textarea>
           <br><br>
           <input type="submit" value="Submit">
           </form>
           </div>
           ';
       }
   
    

    ?>
    </div>
    </body>


</html>
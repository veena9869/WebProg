<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>ThronesRealm</title>
   
    <link href="/css/bootstrap.min.css" rel="stylesheet">   
 </head>
  <body>
  <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <li><a href="profile.php">Tags</a></li>
            <li><a href="logForm.php">Login/Register</a></li>
            <li><a href="tagDisplay.php">Questions</a></li>

          </ul>
        </div>
      </div>
    </nav>
    <br>
    <br>
      <br>
    <br>
    </body>
</html>
<?php session_start();
    error_reporting(0);

    include_once "Db_Config.php";	
	$conn = new mysqli($servername, $username, $password, $dbname);
	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
    if($_SESSION['logged_in'] == 0)
    {   
    echo '<div class="row">
          <div class="col-md-3 col-md-offset-3">
            <p>Sorry, you have to be <a href="index.php">Logged in</a> to submit a question.</p>
          </div>
          </div>';
    }
    else
    {    
        $sql = "SELECT t_id,t_name,t_description FROM type";
        $result = $conn->query($sql);

        if(!$result)
        {          
			echo $result;
            echo 'Error while selecting from database. Please try again later.';
			echo $result;
        }
        else
            {
                echo ' <div class="row">
                       <div class="col-md-3 col-md-offset-3">
                       <form class="form-horizontal" method="post" action="question.php" method="post">
                       <legend>Create Question</legend>
					   <br>Title:
                       <br><input type="text" name="title" />
					   ';
                echo '
                        </div>
                        </div>';
                echo '<br>
                    <div class="row">
                        <div class="col-md-3 col-md-offset-3 ">
                        Content: <textarea class="form-control" rows="3" name="content" /></textarea>
                        <input type="submit" name="submit"	value="Submit" class="btn btn-primary"/>
    					</fieldset>
                        </form>
                        </div>
                    </div>';
			}
    }
?>

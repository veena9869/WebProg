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
      </div>
   </div>
</div>

        <div class="col-md-6">
    <?php
            
            
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(E_ALL);
            
            chmod("C:/MAMP/htdocs/profilepics/", 777);
            session_start();
            
            $requser = $_GET['var'];

        if ($conn->connect_error) 
	       {
		      die("Connection failed: " . $conn->connect_error);
	       } 
        
        if($_SESSION['logged_in'])
        {
            
            echo 'Welcome ' . $_SESSION['username'] .', <a href="Logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
            
             echo "You are now viewing " .$requser."'s profile";
            
             $sqluser="select user_id from users where user_name='".$requser."'";
        $resultuser = $conn->query($sqluser);        
                //$rowuser=$resultuser->fetch_assoc();
            $rowuser=mysqli_fetch_assoc($resultuser);
        
        $userid =$rowuser['user_id'];
            $sqlavatar="select * from avatar where avatar_uid='$userid'";
				echo $_SESSION['userID'];
					$resultavatar = mysqli_query($conn, $sqlavatar);
					$rowavatar = mysqli_fetch_assoc($resultavatar);
            echo $rowavatar['filename'];
					 if($rowavatar['filetype'] == '0') {
						$imgname = $rowavatar['filename'];
                         $path="C:/MAMP/htdocs/profilepics/".$imgname;
						 echo '<img src="'.$path.'"style="width:304px;height:228px;">';
						
					}
					
            echo '<form enctype="multipart/form-data" action="fileupload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="50000">
            <input type = "hidden" name = "uid" value ="'.$_SESSION['userID']. '">
            File: <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>';
        }       
            
            
            $sql = 'SELECT * FROM question WHERE q_asker = "' . $requser . '"';
            
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
           
            ?>
        </div>
</body>
</html>
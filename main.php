<html>
<head>
<title>Ajax Image Upload Using PHP and jQuery</title>
<link rel="stylesheet" href="style.css" />
<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed|Open+Sans+Condensed:300' rel='stylesheet' type='text/css'>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="script.js"></script>
</head>
    
<?php
    include_once 'nav.php';?>
<style>
div.container {margin-top: 4.5em !important;}
    
</style>
<body>
<div class="main">
<h1>Ajax Image Upload</h1><br/>
<hr>
<form id="uploadimage" action="" method="post" enctype="multipart/form-data">
<div id="image_preview"><img id="previewing" src="noimage.png" /></div>
    
<hr id="line">
<div id="selectImage">
<label>Select Your Image</label><br/>
<input type="file" name="file" id="file" required />
<input type="submit" value="Upload" class="submit" />
</div>
</form>
</div>
<h4 id='loading' >loading..</h4>
<div id="message"></div>
    <div id="resultimage"><img id="results" src="noimage.png"/></div>
    
    
<div class="container">
  <div class="jumbotron">
    <h1>Thrones Realm</h1>
    <p> Welcome to world of Game of Thrones. Post your Questions here!</p>
  
    <div class="container">
      
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
            //$sqlavatar="select * from avatar where avatar_uid='$userid'";
				echo $_SESSION['userID'];
					//$resultavatar = mysqli_query($conn, $sqlavatar);
					//$rowavatar = mysqli_fetch_assoc($resultavatar);
            /*echo $rowavatar['filename'];
					 if($rowavatar['filetype'] == '0') {
						$imgname = $rowavatar['filename'];
                         $path="C:/MAMP/htdocs/profilepics/".$imgname;
						 echo '<img src="'.$path.'"style="width:304px;height:228px;">';
						
					}*/
					
            /*echo '<form enctype="multipart/form-data" action="fileupload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="50000">
            <input type = "hidden" name = "uid" value ="'.$_SESSION['userID']. '">
            File: <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Image" name="submit">
          </form>';*/
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

    <?php
    include_once 'footer.php';?> 
</html>
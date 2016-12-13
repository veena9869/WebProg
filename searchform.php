<html>
	<head>
		<title>Search Box</title>	
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
  <div class="jumbotron">
    <h1>Thrones Realm</h1>
    <p> Welcome to world of Game of Thrones. Post your Questions here!</p>
  
    <div class="container">
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
         echo '<a href="Profile.php?var=' . $_SESSION['username'] . '">Profile</a>';            
        }        
        ?>
                
        <?php
    echo "<form  method='post' action='searchform.php'  id='searchform' class='frms'> 
	      <input  type='text' name='name' autocomplete='off'> 
	      <input  type='submit' name='submit' value='Search' id='search'> 
	    </form> ";
 echo "</div>" ?>
        
      </div>
      </div>
  
		<?php
        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
error_reporting(0);
        
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
 $search = $_POST["name"];
  //echo $search;
  if(isset($_POST['name']))
    {
      $sql = "SELECT * FROM   users where user_name like    '%".$search."%'";
	   $result=$conn->query($sql);
      
	    if($result!==NULL) 
	    {     
	      while($row = mysqli_fetch_array($result))   
	       {       echo'  <div class="Profiles" >
                            <div class="List" >
                                <div class="lists" >
                                    <a href="Profile2.php? var='  . $row['user_name'] . '" style ="color:green">' . $row['user_name'] .
                                    '</a> 
                                </div>                       
                        </div>
                    </div> '; 
          }
    }
  }
        
    else
    { $sql = "SELECT * FROM users where `user_name` like '%".$_POST['name']."%'";
	    
	   $result=$conn->query(sql);
	    while($row=mysqli_fetch_array($result))
	    {
		$nam = $row['user_name'];
            
                    echo $nam;
		
	    }
    }   
?>
        
	</body>
</html>



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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
        
<?php
    include_once 'nav.php';?>
<style>
div.container {margin-top: 4.5em !important;}
</style>
    
<body>
        
        <?php
        if($_SESSION['logged_in'])
        {
            echo 'Welcome ' . $_SESSION['username'] .', <a href="logout.php"><button type="button" class="btn btn-danger">Logout</button></a>';
        }
        else
        {}
        ?>
        
        <div class="col-md-6">
            <?php

              include_once 'Db_Config.php';
              
              $conn = new mysqli($servername, $username, $password, $dbname);
              if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
              $sql = "SELECT *  FROM question  ORDER BY q_value DESC";
              $result = $conn->query($sql);
           
				

              while($row = mysqli_fetch_array($result))
                {  
                  
                  $freeze = $row['freeze'];
                  echo'<div class="container" >
                    <div class="well" style ="color:green">
                        <div class="Question" >
                            <div class="votes" >
                                <div class="views" >
                                    <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">' . $row['q_title'] .
                                    '</a>  <br><a href = "Profile2.php? var='.$row['q_asker'].'" style ="color:blue">'. $row['q_asker'] . '</a> <br> User Score: '.$row['asker_score'].'<div align="right">';
                  if($freeze==0){
                      //echo'<a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green"></a>';
                     echo '<a href = "Freeze.php? var='.$row['q_id'] . '"><button type="button" class="btn btn-info" >Freeze</button></a>';
                  }
                   else
                   {
                    echo '<a href = "Unfreeze.php? var='.$row['q_id'] . '"><button type="button" class="btn btn-success" >Unfreeze</button></a>';   
                   }
                      echo '<a href = "Edit.php? var='.$row['q_id'] . '"><button type="button" class="btn btn-warning">Edit</button></a>'.
                      '<a href = "Delete.php? var='.$row['q_id'] .'"><button type="button" class="btn btn-danger">Delete</button></a>
                      </div>
                      
                    
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
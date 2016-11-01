<!DOCTYPE html>
<html>

<head>
    <title>Thrones Realm </title>
    <meta charset="utf-8">
    <meta http-eqiuv="XUA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intitail-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>


    <div class="jumbotron">
        <div class="container">
        <h1>Thrones Realm</h1>
        <p> Welcome to world of Game of Thrones. Post your Questions here!</p>

        
            <a href="loginform.php">
                <button type="button" class="btn btn-success">Login or Register</button>
            </a>
            <a href="index.php">
                <button type="button" class="btn btn-danger">Home</button>
            </a>
            <a href="Questions.php">
                <button type="button" class="btn btn-primary">Questions</button>
            </a>
            <a href="SubmitQuest.php">
                <button type="button" class="btn btn-success">Post a Question</button>
            </a>
            <a href="Profile.php">
                <button type="button" class="btn btn-primary">Profile</button>
            </a>
            <br>
            <br>
        </div>
    </div>
    

            <?php
				ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);
				session_start();
				error_reporting(0);
				include_once "Db_Config.php";
				
				$questionID = $_GET['var'];
				$_SESSION['questionNum'] = $questionID;				
                $conn = new mysqli($servername, $username, $password, $dbname);
				if ($conn->connect_error ) {
					die("Connection failed: " . $conn->connect_error);
				}
				$sql = "SELECT * FROM users u LEFT JOIN question q ON u.user_name = q.q_asker where q_id =$questionID";
       
				$result = $conn->query($sql);        
                $row=$result->fetch_assoc();
                $uid=$row['user_id'];
                
                echo '
                
                <div class="container">
                <div class="well">
                <div class="row">
                <h2 class="page-header" style = "color:black">'.$row['q_title'].'</h2>';
    
                echo'
                        <div class="col-xs-12 col-sm-8" >                    
                            <div class = "content" style = "color:black">Question Description- '.$row['q_content'] .'</div>
                            <div class = "asker" style = "color:black">  Posted By- '. $row['q_asker'] .'</div>                    
                        </div>';
                   if($_SESSION['username']!= null ){     
                       echo' 
                       <div class = "col-xs-12 col-sm-2" style="color:black">
                            <form method="post" action="voteQuestion.php">
							     <input type="submit" name="up" value="up">
							     <input type="hidden" name="id" value="'.$questionID . '">
                                 <input type="hidden" name="uid" value="'.$uid . '">
				            </form>votes 
                            '.$row['q_value'].'
                            <form method="post" action="voteQuestion.php">
							     <input type="submit" name="down" value="down">
							     <input type="hidden" name="id" value="'.$questionID . '">
                                 <input type="hidden" name="uid" value="'.$uid . '">
							 </form>
                        </div>
                        </div>
                    </div>';
                   }
                 else{
                echo '<div class = "answer">
                      <form method="post" ">
                        <button onclick = "alertlogin()">up</button>
                      </form>
                      '.$row['q_value'].'
                      <form method="post" ">
					    <button onclick = "alertlogin()">down</button>
				    </form>
                </div>';
                }
                  echo '  <div class= "submit-answer">
										<form method="post" action="submitAnswer.php" method="post">
								         <br><textarea class="form-control" rows="3" name="answer" /></textarea><br>
								         <input type="submit" name="submit"	value="Submit" >
								         <input type="hidden" name="id" value="'.$_SESSION['questionNum']. '">
										 </form>
						              </div><br><br>';?>
	
	<div>
		<?php
			$conn1 = new mysqli($servername, $username, $password, $dbname);
			$sql2 = "SELECT * FROM question JOIN answer ON question.q_id = answer.a_id
					WHERE question.q_id = '$questionID'	ORDER BY a_best DESC,a_rating DESC";
        
        $result2 = mysqli_query($conn1,$sql2);
        

        while($row = mysqli_fetch_assoc($result2)){
            
            if($_SESSION['username']!= null ){
            echo '<div class = "container">
            <div class = "well">
            <div class = "row">
            <div class = "col-xs-12 col-sm-2" style="color:black">
                      <form method="post" action="voteAnswer.php">
                        <input type="submit" name="up" value="up">
                        <input type="hidden" name="id" value="'.$row['a_order'] . '">
                        <input type="hidden" name="uid" value="'.$uid . '">
				    </form>votes 
                     '.$row['a_rating']. '
                    <form method="post" action="voteAnswer.php">
					    <input type="submit" name="down" value="down">
					    <input type="hidden" name="id" value="'.$row['a_order'] . '">
                        <input type="hidden" name="uid" value="'.$uid . '">
					</form>
                </div>';
            }
            else{
                echo '<div class = "col-xs-12 col-sm-2">
                      <form method="post" ">
                        <button onclick = "alertlogin()">up</button>
                      </form> votes 
                     '.$row['a_rating']. '
                    <form method="post" ">
					    <button onclick = "alertlogin()">down</button>
				    </form>
                </div>';
            }
                
               echo' <div class="col-xs-12 col-sm-8" style="text-align:center">
							              <div style="color:black">'. $row['a_content'] .'</div>
                                          <div style="color:black">-'. $row['a_asker'] .'</div>
			                  </div>
                              <div class = "col-xs-12 col-sm-2">';
            
            if($_SESSION['username'] == $row['q_asker'] && $row['a_best']==0){                
				echo '<form method="post" action="submitBest.php">
                <span class= "glyphicon glyphicon-thumbs-up"></span>
				<input type="submit" name="select" value="like">
				<input type="hidden" name="id" value="'.$row['a_order']. '">
                <input type ="hidden" name = "best" value = "'.$row['a_best']. '">             
				</form>';
                }
            else if($row['a_best']==1){
                echo '<form method="post" action="submitBest.php">
                <span class= "glyphicon glyphicon-thumbs-up" style="color:green"></span>
			    <input type="submit" name="select" value="liked">
			    <input type="hidden" name="id" value="'.$row['a_order']. '">
                <input type ="hidden" name = "best" value = "'.$row['a_best']. '">             
			    </form>';
            }
            echo'</div>
            </div>
            </div>
            </div>';
            
        
            
        }			
		?>
    </div>
    
</body>

</html>
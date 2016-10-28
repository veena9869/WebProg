<!DOCTYPE html>
<html>
<head>
	<title>Thrones Realm </title>
</head>
    <style>
        .description {
    background-color: while; /* Green */
    color: black;
    padding: 15px 32px;
    text-align: center;
    display: inline-block;
    font-size: 16px;            
    cursor: pointer;
    float: left;
}
        
    </style>
<body>
<div>
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
                echo '<h2 class="page-header">'.$row['q_title'].'</h2>';
                echo'<div class="description-div">
                        <div class= "description">                    
                            <div class = "content">'.$row['q_content'] .'</div>
                            <div class = "asker"> -'. $row['q_asker'] .'</div>                    
                        </div>
                        <div class = "description-voting">
                            <form method="post" action="voteQuestion.php">
							     <input type="submit" name="up" value="up">
							     <input type="hidden" name="id" value="'.$questionID . '">
				            </form>
                            <form method="post" action="voteQuestion.php">
							     <input type="submit" name="down" value="down">
							     <input type="hidden" name="id" value="'.$questionID . '">
							 </form>
                        </div>
                    </div>';
                
                 
                  echo '  <div class= "submit-answer">
										<form method="post" action="submitAnswer.php" method="post">
								         <br><textarea class="form-control" rows="3" name="answer" /></textarea>
								         <input type="submit" name="submit"	value="Submit" >
								         <input type="hidden" name="id" value="'.$_SESSION['questionNum']. '">
										 </form>
						              </div>';?>
	</div>
	<div>
		<?php
			$conn1 = new mysqli($servername, $username, $password, $dbname);
			$sql2 = "SELECT * FROM question JOIN answer ON question.q_id = answer.a_id
					WHERE question.q_id = '$questionID'	ORDER BY a_best DESC,a_rating DESC";
        $result2 = mysqli_query($conn1,$sql2);

        while($row = mysqli_fetch_assoc($result2)){
            echo '<div class = "answer">
                      <form method="post" action="voteAnswer.php">
                        <input type="submit" name="up" value="up">
                        <input type="hidden" name="id" value="'.$row['a_order'] . '">
				    </form>
                     '.$row['a_rating']. '
                    <form method="post" action="voteAnswer.php">
					    <input type="submit" name="down" value="down">
					    <input type="hidden" name="id" value="'.$row['a_order'] . '">
					</form>
                </div>
                <div class="answer">
							              <div>'. $row['a_content'] .'</div>
                                          <div>'. $row['a_asker'] .'</div>
			                  </div>
                <div class = "answer">';
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
			    <input type="submit" name="select" value="liked">
			    <input type="hidden" name="id" value="'.$row['a_order']. '">
                <input type ="hidden" name = "best" value = "'.$row['a_best']. '">             
			    </form>';
            }
            echo'</div>';
        
            
        }			
		?>
	</div>
</body>
</html>
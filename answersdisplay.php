<!DOCTYPE html>
<html>
<?php 
    require_once $_SERVER['DOCUMENT_ROOT'].'/nbbc/nbbc.php';
    ?>
<head>
    <title>Thrones Realm </title>
    <meta charset="utf-8">
    <meta http-eqiuv="XUA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width,intitail-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="//cdn.ckeditor.com/4.6.0/full/ckeditor.js"></script>
</head>

<body>

<script>
function freeze() {
    alert("Answer cannot be submitted!");
}
</script>
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
				$bbcode = new BBCode;
				$questionID = $_GET['var'];
				$_SESSION['questionNum'] = $questionID;				
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
                <h2 class="page-header" style = "color:black">'.html_entity_decode($bbcode->Parse($row['q_title'])).'</h2>';
    
                echo'
                        <div class="col-xs-12 col-sm-8" >                    
                            <div class = "content" style = "color:black">Question Description- '.html_entity_decode($bbcode->Parse($row['q_content'])) .'</div>
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
    if($row['freeze']==0){
                  echo '  <div class= "submit-answer">
										<form method="post" action="submitAnswer.php" method="post">
								         <br><textarea class="form-control" rows="3" name="answer" id="input"></textarea><br>
								         <input type="submit" name="submit"	value="Submit" >
								         <input type="hidden" name="id" value="'.$_SESSION['questionNum']. '">
										 </form>
						              </div><br><br>';
    }
    else{
        echo '<br><textarea class="form-control" rows="3" name="answer" id="input"></textarea><br>
        <button onclick = "freeze()" style = "color:black">Submit</button>
        <br><br>';
    }?>
    <script>CKEDITOR.replace( 'input');</script>
	
	<div>
		<?php
			$conn1 = new mysqli($servername, $username, $password, $dbname);
        //$sql = "SELECT *  FROM question ORDER BY q_value DESC LIMIT 5";
              $sqlanswers ="Select count(*) as anscount FROM question JOIN answer ON question.q_id = answer.a_id
					WHERE question.q_id = '$questionID'	ORDER BY a_best DESC,a_rating DESC";
              //$result = $conn->query($sql);
            $resultans = $conn->query($sqlanswers);
            $rowans = mysqli_fetch_array($resultans);
            $anscount=$rowans['anscount']/2;
       
        $page=0;
            
            while( $i<$anscount)
            {
                $i=$i+1;
               echo' <ul class="pagination">
    <li><a href="anspagin.php? var1='.$i.'&var='.$questionID.'">'.$i.'</a></li>    
  </ul>';
                
            }
			$sql2 = "SELECT * FROM question JOIN answer ON question.q_id = answer.a_id
					WHERE question.q_id = '$questionID'	ORDER BY a_best DESC,a_rating DESC LIMIT ".$page.",2";
        
        
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
							              <div style="color:black">'. html_entity_decode($row['a_content']) .'</div>
                                          <div style="color:black">-'. $row['a_asker'] .'</div>
			                  </div>
                              <div class = "col-xs-12 col-sm-2">';
            
            if($_SESSION['username'] == $row['q_asker'] && $row['a_best']==0 && $row['freeze']==0){                
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
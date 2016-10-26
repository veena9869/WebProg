<!DOCTYPE>
<html>
<head>
		<link href="css/testConvo.css" rel="stylesheet">
	 	<link href="/css/bootstrap.min.css" rel="stylesheet">
		 <title>http://bootsnipp.com/snippets/featured/google-plus-styled-post</title>
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
            <li class="active"><a href="index.php">Home</a></li>
			      <li><a href="profile.php">Profile Page</a></li>
            <li><a href="logForm.php">Login/Register</a></li>
            <li><a href="uploadBlob.php">Avatar</a></li>
            <li><a href="tagDisplay.php">Archive</a></li>
          </ul>
        </div>
      </div>
    </nav>
</head>
<body>
	<div class="container">
	  <div class="row">
	    <div class="col-md-8">
<br>
<br>
<br>
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
                echo'<section class="comment-list">
						          <article class="row">
						            <div class="col-md-2 col-sm-2 hidden-xs">
						              
						                <figcaption class="text-center">'.$row['q_asker'].'</figcaption>
						              
						            </div>
						            <div class="col-md-10 col-sm-10">
						              <div class="panel panel-default arrow left">
						                <div class="panel-body">
						                  <header class="text-left">						                    
						                    <div>
							                    <form method="post" action="voteQuestion.php">
							                    	<i class="fa fa-chevron-circle-up fa-2x"></i><input type="submit" name="up" value="up">
							                    	<input type="hidden" name="id" value="'.$questionID . '">
							                    </form>
							                 </div>
							                 <div>
							                    <form method="post" action="voteQuestion.php">
							                    	<i class="fa fa-chevron-circle-down fa-2x"></i><input type="submit" name="down" value="down">
							                    	<input type="hidden" name="id" value="'.$questionID . '">
							                    </form>
							                 </div>
						                  </header>
						                  <div class="comment-post">
						                    <p>'. $row['q_content'] .'</p>
						                  </div>

						                </div>
						              </div>
						            </div>
						          </article>
					          </section>';
                  echo '  <article class="row">
						            <div class="col-md-10 col-sm-10">
						              <div class="panel panel-default ">
										<form method="post" action="submitAnswer.php" method="post">
								         <br><textarea class="form-control" rows="3" name="answer" /></textarea>
								         <input type="submit" name="submit"	value="Submit" >
								         <input type="hidden" name="id" value="'.$_SESSION['questionNum']. '">
										 </form>
						              </div>
						            </div>
						          </article>
						          ';?>
	</div>
	<div>
		<?php
			$conn1 = new mysqli($servername, $username, $password, $dbname);
			$sql2 = "SELECT *
					FROM question
					JOIN answer
					ON question.q_id = answer.a_id
					WHERE question.q_id = '$questionID'
					ORDER BY a_best DESC,a_rating DESC";
        $result2 = mysqli_query($conn1,$sql2);

        while($row = mysqli_fetch_assoc($result2)){
        echo '<section class="comment-list">
                <article class="row">
                    <div class="col-md-10 col-sm-10">
                        <div class="panel panel-default arrow right">
                            <div class="panel-body">
                                <header class="text-right">
							         <i class="fa fa-usd"></i> '.$row['a_rating']. '
							         <i class="fa fa-trophy"></i> '.$row['a_best']. '
							         <br>
							         <div>
							             <form method="post" action="voteTest.php">
							                 <i class="fa fa-chevron-circle-up fa-2x"></i><input type="submit" name="up" value="up">
							                 <input type="hidden" name="id" value="'.$row['a_order']. '">
							             </form>
							         </div>
							         <div>
							            <form method="post" action="voteTest.php">
							            	<i class="fa fa-chevron-circle-down fa-2x"></i><input type="submit" name="down" value="down">
							            	<input type="hidden" name="id" value="'.$row['a_order']. '">
							            </form>
							         </div>
							         <div>';
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
							    </header>
							    <div class="comment-post">
							              <p>'. $row['a_content'] .'</p>
			                  </div>';
            echo '
                        </div>
				    </div>
				</div>
				<div class="col-md-2 col-sm-2 hidden-xs">
				    <figcaption class="text-center">'.$row['a_asker'].'</figcaption>
				</div>
				</article>
				</section>';
        }			
		?>
	</div>
		</div>
	</div>
</div>

</body>
</html>

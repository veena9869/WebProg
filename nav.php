<nav class="navbar navbar-light bg-faded navbar-fixed-top topnav" role="navigation">
  <ul class="nav navbar-nav" id="menu" static>
        
    <?php 
      session_start();
      if(!$_SESSION['logged_in']){
      echo'
      <li class="nav-item">
      <a class="nav-link" href="loginform.php">Login or Register</a></li>';
             echo '
             <li class="nav-item active">
                <a class="nav-link" href="demo.php">Github </a>
             </li>';
        }?>
    <li class="nav-item active">
      <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
        <div class="col-xs-1 col-sm-5 col-md-5 lg-10" class="pull-right">
            <form class="navbar-form" role="search" action="Search.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search User" id="name" onKeyUp="showResult(this.value)" name="name">
            <div class="input-group-btn" >
                <button class="btn btn-default" type="submit" id="searchsubmit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
        </div>
        </form>
        </div>   
    </li>
      
      
        <li class="dropdown">
                     <a href="#" class="dropdown-toggle" data-toggle="dropdown"
                         role="button" aria-haspopup="true" aria-expanded="false">
                         Ask Questions <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="SubmitQuest.php">Post a Question</a></li>
                            <li><a href="Questions.php">All Questions Posted</a></li>
                            <li><a href="wordcount.php">Wordle</a></li>
<!--                            <a href="answersdisplay.php? var='  . $row['q_id'] . '" style ="color:green">'-->
                         <?php echo'   <li><a href="Profile.php?var='.$_SESSION['username'].'">User Profile</a></li>';
                            ?>
                            <?php 
        include_once 'Db_Config.php';
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sqladmin = 'select admin from users where user_name="'.$_SESSION['username'].'"';
        $resultadmin = $conn->query($sqladmin);
        $rowadmin = mysqli_fetch_array($resultadmin);
        
        $sqlusrname = 'select user_score from users where user_name="'.$_SESSION['username'].'"';
            $resultusrname = $conn->query($sqlusrname);
            //echo $resultusrname;
        
        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }
        if($rowadmin['admin']==1){?>
                            <li><a href="Admin.php">Admin</a></li>
        
        <?php }?>
                            <li role="separator" class="divider"></li>
       <?php
        if($_SESSION['logged_in'])
        {
            echo  '<li class="nav-item" style="float:right margin-right:50px">  '. $_SESSION['username'] .', 
            </li>
                  <li class="nav-item" >
                    <a class="nav-link" href="logout.php">Logout</a>
                  </li>
                  ';
        
        echo '<div class="pull-right">
        
      </div>';
        }
        ?>
            </ul>
      </li>
                            
        
      
 </ul>
</nav>
<!DOCTYPE>
<html>
<head>
    <title>Thrones Realm</title>
    <link href="main.css" rel="stylesheet">
    <meta http-eqiuv="XUA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,intitail-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  <link href="main.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
  <script src="//cdn.ckeditor.com/4.6.0/standard/ckeditor.js"></script>
</head>
    
    <?php
    include_once 'nav.php';?>
<style>
div.container {margin-top: 4.5em !important;}
</style>
    
<body>
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
        
        <button type="button" class="btn btn-warning">Votes</button> <br><br> 
         
    <?php
    
    session_start();
    error_reporting(0);
	$url = "Admin.php";
    $q_id = $_GET['var'];
	$sql = "select * from question where q_id=".$q_id;
    $result = $conn->query($sql);        
    $row=$result->fetch_assoc();
	if ($conn->connect_error)
    {
		die("Connection failed: " . $conn->connect_error);
	}
    
           echo '
           <div class="container">
           <div class="quest-area">
           <form class="quest-form" action="questupdate.php" method="post">
           <b>Title</b><br><textarea rows="3" cols="150" name="title" >'.$row['q_title'].
           '</textarea><br><br>
           <b>Description</b><br><textarea rows="10" cols="150" name="content" id="input">'.$row['q_content'].'</textarea>
           <br><br>
            <input type="submit" value="Submit">
            <input type="hidden" name="id" value="'.$q_id . '">
           </form>
           </div>
           </div>
           ';   

    ?>
    <script>CKEDITOR.replace( 'input');</script>
        </body>
</html>
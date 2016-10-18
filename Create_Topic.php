<?php

session_start();
include_once "Db_Configure.php";


$tbl_name="questions";
$tbl_name2="users";
$tbl_name3="answers";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
//$username=$_POST['username'];

$uname = $_SESSION['username'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Milestone 1</title>
<meta charset="UTF-8">
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Create question </h1>
	<?php
	$uname = $_SESSION['username'];
	$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";
    $result=$db->query($sql);
	$results=$db->query($sql1);
	$row=mysqli_fetch_array($results);
	$uid=$row['uid'];    ?>
    
    <div class = "user">
        <strong>Welcome, </strong> <?php echo $uname; ?>
        [<a href="index.php?action=logout">log out</a>]
    </div>
    <a href="index.php"><strong>Back to Main Page</strong> </a>
    <div class="table">
	   <form id="form1" name="form1" method="post" action="add.php">
			<div class="table">
					<strong>Topic</strong>:
					<input name="topic" type="text" id="topic" size="50" />			
					<strong>Detail</strong>:
					<textarea name="detail" cols="50" rows="3" id="detail"></textarea>				
				&nbsp;
				&nbsp;				
				<input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" />
            </div>
        </form>
    </div>
</body>
</html>
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
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Post a Question </h1>
	<?php
	$uname = $_SESSION['username'];

	$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";
    $result=$db->query($sql);

	$results=$db->query($sql1);

	$row=mysqli_fetch_array($results);

	$uid=$row['uid'];
    ?>
<div class = "user">
	 <strong>Welcome, </strong> <?php echo $uname; ?>
[<a href="index.php?action=logout">log out</a>]
</div>
<div class="back-page">
<a href="index.php"><strong>Back to Main Page</strong> </a>
</div>	
<div class="table">
	<form id="form1" name="form1" method="post" action="add.php">
					<strong>Title</strong>:
					<input name="topic" type="text" id="topic" size="100"/>
                    <br>
				    <strong>Description</strong>:
					<textarea name="detail" cols="120" rows="10" id="detail"></textarea>
                    <br><br>
				
    <input type="submit" name="Submit" value="Submit" /> <input type="reset" name="Submit2" value="Reset" />

</form>
</div>

    </body>

</html>
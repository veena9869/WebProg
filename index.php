<?php
//SELECT * FROM `question` INNER JOIN `user` on question.u_id = user.id 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include_once "Db_Configure.php";
$tbl_name="questions";
$tbl_name2="users";
$tbl_name5="tags";
$tbl_name6="questag";

error_reporting(0);
if($_GET['action'] && $_GET['action'] == "logout"){
	unset($_SESSION['loggedIn']);
	unset($_SESSION['username']);
	unset($_SESSION['id']);
}
if (!$_SESSION['loggedIn']){
	header("location: login.php");
	die();
}

$uname = $_SESSION['username'];
$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());

$sql="SELECT * FROM  `$tbl_name` ORDER BY Answer_Count DESC,Date_created DESC";

$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

$result=$db->query($sql);

$results=$db->query($sql1);

$row=mysqli_fetch_array($results); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Milesone 1</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


	<h1> Welcome to Questions and Answers Website</h1>

	<div class = "search">
	
	<ul id="content"></ul>

	</div>
<div class = "user"><strong>Welcome, </strong> 
    <?php echo $uname; ?>
	[<a href="index.php?action=logout">log out</a>]</td>
</div>		
        <nav class="post-quest">
				<a href="Create_Topic.php"><strong>Ask a Question</strong> </a>
		</nav>
		

	<div class="heading">
		<div class = "cell" ><strong>Question-Title</strong></div>		
		<div class = "cell" ><strong>Number of answers</strong></div>		
		<div class = "cell" ><strong>Like/Unlike</strong></div>
        <div class = "cell" ><strong>Posted On</strong></div>
		</div>
    
    	<?php
			while($rows=mysqli_fetch_array($result)){
				$question = $rows['qid']; ?>
                <div class="rows">
                    <div class = "cell" ><a href="view.php?id=<?php echo $rows['qid']; ?> "><?php echo $rows['Title']; ?></a><BR>
					<?php $quest = $rows['qid'];
					$tag_num = array();	?>
                </div>
			<div class = "cell" ><?php echo $rows['Answer_Count']; ?></div>
			<div class = "cell" ><?php echo $rows['Vote_Count']; ?></div>
			<div class = "cell" ><?php echo $rows['Date_created']; ?></div>
			</div>
			<?php }	?>
</div>

</body>

</html>


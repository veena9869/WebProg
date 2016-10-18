<?php
//SELECT * FROM `question` INNER JOIN `user` on question.u_id = user.id 

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

$sql="SELECT * FROM  `$tbl_name` ORDER BY Answer_Count DESC,Date_created DESC LIMIT 10";

$sql1="SELECT id FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

$result=$db->query($sql);

$results=$db->query($sql1);

$row=mysqli_fetch_array($results); ?>

<!DOCTYPE html>
<html>
<head>
	<title> Milesone 1</title>
<meta charset="UTF-8">
 <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="searchscript.js"></script>
<script src="script.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>


	<h1> Welcome to Question and Answers Website</h1>

	<div class = "search">
	
	<ul id="content"></ul>

	</div>
<div class = "user"><strong>Welcome, </strong> 
    <?php echo $uname; ?>
	(<a href="index.php?action=logout">log out</a>)</td>
</div>		
<div class = "table"> 
	<div class = "create">
		<form>			</td>
				<a href="Create_Topic.php"><strong>Create New Topic</strong> </a>
		
		</form>
	</div>

	<div class="heading">
		<div class = "cell" ><strong>Topic</strong></div>		
		<div class = "cell" ><strong>Replies</strong></div>		
		<div class = "cell" ><strong>Vote</strong></div>
        <div class = "cell" ><strong>Date/Time</strong></div>
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


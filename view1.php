<?php
session_start();
include_once "Db_Configure.php";

$tbl_name="questions";
$tbl_name2="users";
$tbl_name3="answer";

$db = new mysqli($host, $user,$pw,$db_name);

$id=$_GET['id'];
$sql="SELECT * FROM `$tbl_name` WHERE `qid` = $id";
$result=$db->query($sql) ;
$rows=mysqli_fetch_array($result);


$login = $_SESSION['username'];


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
<div class = "search">
	<form  role="form" method="post" >
		<input type="text" class="form-control" id="keyword" placeholder="Enter a username">
	</form>
	<ul id="content"></ul>
</div>


<?php
	$uname = $_SESSION['username'];

	$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";

	$result=$db->query($sql);

	$results=$db->query($sql1);

	$row=mysqli_fetch_array($results);

	$uid=$row['uid'];

	$sqlpic ="SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

	//echo $sqlpic;

	$respic = $db->query($sqlpic);
	$rpic = mysqli_fetch_array($respic);

	if($rpic['picture'] != ""){
			//echo $rpic['picture'];

			echo"<img width='50' height='50' src='Pictures/".$rpic['picture']."' alt=Profile Pic'>";
		}
		else if($rpic['picture'] == "" && $rpic['gitpic'] != "")
		{
			//echo $rpic['gitpic'];
			?>

			 <img width='50' height='50' src="<?php echo $rpic['gitpic']; ?>" alt="Avatar">
			<?php
		}else if($rpic['gravatar'] != ""){
			?>

			 <img width='50' height='50' src="<?php echo $rpic['gravatar']; ?>" alt="Avatar">
			<?php
		}

		else{
			//echo "default";
			echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
			
		}

			?>
<div class = "user">
	 <strong>Welcome, </strong>
		<?php

$sqladmin= "SELECT * FROM `$tbl_name2` WHERE `username` = '".$uname. "'";

$adres=$db->query($sqladmin);
$adrow=mysqli_fetch_array($adres);

if($adrow['admin'] == 1){
	
	?>
<div class="admin"><td>Admin</td></div>
	<?php
					}
	$scr=0;
	$scr = $adrow['score'];

	?>
	<a href="profile.php?id=<?php echo $row['uid']; ?>" ><?=$_SESSION['username']?> </a>  Score:<?php echo $scr; ?>

	(<a href="index.php?action=logout">log out</a>)

</div>


<a href="index.php"><strong>Back to Main Page</strong> </a>


<div class="table">





<div class="heading "><strong><?php echo $rows['Title']; ?></strong></div>
<div class="viewcell">

<div class="vcell">
	

		<?php echo $rows['Description']; ?>

		<br />


			<?php
				$name = "Anon";
				$number = $rows['uid'];

				$sqli="SELECT username FROM `$tbl_name2` WHERE `uid`= $number";
				//echo $sqli;

				$res=$db->query($sqli);

				$row=mysqli_fetch_array($res);


				if (isset($row)){
					$name=$row['username'];
					}

					if($number == 0)
						{
							$name="Anon";
						}


						//echo $name;

					$scor="SELECT score FROM `$tbl_name2` WHERE `username` = '".$name. "'";
					$r = $db->query($scor);

					$rscr = mysqli_fetch_array($r);
			?>
	

	<strong>By :</strong> <a href="profile.php?id=<?php echo $rows['uid']; ?>" ><?php echo $name; ?></a>
	Score: <?php echo $rscr['score']; ?>
	<?php
	
	$sqlpicture = "SELECT * FROM `$tbl_name2` WHERE `uid` =$number";

	//echo $sqlpicture; 

	$picres=$db->query($sqlpicture);
	$picrow=mysqli_fetch_array($picres);

	if($picrow['picture'] != ""){
			//echo $rpic['picture'];
		echo"<img width='50' height='50' src='Pictures/".$picrow['picture']."' alt=Profile Pic'>";
			
		}
		else if($picrow['picture'] == "" && $picrow['gitpic'] != "")
		{
			//echo $rpic['gitpic'];
			?>

			 <img width='50' height='50' src="<?php echo $picrow['gitpic']; ?>" alt="Avatar">
			<?php
		}else if($rpic['gravatar'] != ""){
			?>

			 <img width='50' height='50' src="<?php echo $picrow['gravatar']; ?>" alt="Avatar">
			<?php
		}

		else{
			//echo "default";
			echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
		}

			?>
	

	



		<br />

	
	<strong>Date/time : </strong><?php echo $rows['Date_created']; ?>
	


</div>
	
	<br />
<!--new line -->
	
			<?php
			$sql2="SELECT * FROM `$tbl_name3` WHERE `qid` = $id ORDER BY `vote_count` DESC";
			//echo $sql2; 
			$result2=$db->query($sql2);
				while($rows=mysqli_fetch_array($result2)){
					?>
					
					
					<div class="vcell">
					
						<?php
					$num = $rows['uid'];
					$sqli2="SELECT * FROM `$tbl_name2` WHERE `uid`= $num";
					//echo $sqli;

					$ress=$db->query($sqli2);

					$roww=mysqli_fetch_array($ress);

				if (isset($ress)){$a_name=$roww['username'];
}



				if($num == 0)
{
$a_name="Anon";
}

			?>
			
			<strong>Name</strong>:
			<a href="profile.php?id=<?php echo $roww['uid']; ?>"><?php echo $a_name; ?></a>

			<?php
			echo $roww['score'];
				$sqlpicture = "SELECT * FROM `$tbl_name2` WHERE `uid` =$num";

				//echo $sqlpicture; 

				$picres=$db->query($sqlpicture);
				$picrow=mysqli_fetch_array($picres);

				if($picrow['picture'] != ""){
			//echo $rpic['picture'];

			echo"<img width='50' height='50' src='Pictures/".$picrow['picture']."' alt=Profile Pic'>";
		}
		else if($picrow['picture'] == "" && $picrow['gitpic'] != "")
		{
			//echo $rpic['gitpic'];
			?>

			 <img width='50' height='50' src="<?php echo $picrow['gitpic']; ?>" alt="Avatar">
			<?php
		}else if($picrow['gravatar'] != ""){
			?>

			 <img width='50' height='50' src="<?php echo $picrow['gravatar']; ?>" alt="Avatar">
			<?php
		}

		else{
			//echo "default";
			echo "<img width='50' height = '50' src='Pictures/default.png' alt='Default Profile Pic'>";
		}

			?>

			
			<br />
		
			
				<strong>Answer</strong>
				:
				<?php echo $rows['Answer']; ?>
				<br />
				<strong>Date/Time</strong>
				:
				<?php echo $rows['creation_date']; ?>
				<br />

			<?php 

				$freeze = "SELECT freeze FROM `$tbl_name` WHERE `qid` = $id";

				$frz=$db->query($freeze);

				$frez=mysqli_fetch_array($frz);

				if($frez['freeze'] == 0){

if($adrow['validate']== 1){
			?>
				<div class="item" data-postid="<?php echo $rows['aid']; ?>" data-score="<?php echo $rows['vote_count']; ?>" data-user="<?php echo $uid; ?>">
					<div class = "vote-span">
						<div class="vote" data-action="up" title="Vote up">
							<i class = "icon-chevron-up"></i>
						</div><!--vote up -->
						<div class="vote-score"><?php echo $rows['vote']; ?></div>
						<div class="vote" data-action="down" title="Vote down">
							<i class="icon-chevron-down"></i>
						</div><!-- vote down -->
					</div><!-- voting -->
				</div><!-- item -->
				<br />



	
			<?php
		}
			$like= $rows['aid'];
			if($_SESSION['username'] == $name && $rows['like'] == 0){
				?>

			<div class = "likecell"> <a href="like.php?like=<?php echo $like; ?>&id=<?php echo $id; ?>">Like this Answer?</a></div>

			<?php
		}
		?>
		
		<?php
		}
		if($rows['like'] == 1){ ?>
		<div class="like"><?php echo $name; ?> liked this answer</div>

		<?php
		}


	
		?>

</div>

<br />
<?php

}


if($frez['freeze'] == 0) 

{

	?>





<?php
	}
	?>
	</div>
	</body>




<?php




$sql3="SELECT view FROM `$tbl_name` WHERE `qid`= $id";

$result3=$db->query($sql3);



$rows=mysqli_fetch_array($result3);

$view=$rows['view'];


if(empty($view)){

$view=1;

$sql4="INSERT INTO `$tbl_name`(`view`) VALUES('$view') WHERE `qid` =$id";

$result4=$db->query($sql4);

}
$addview=$view+1;

$sql5="UPDATE `$tbl_name` SET `view`= $addview WHERE `qid`= $id";

$result5=$db->query($sql5);


$votesql = "SELECT vote FROM `$tbl_name3` WHERE `question_id` = $id";

$resv=$db->query($votesql);
$v=0;
while($rowv=mysqli_fetch_array($resv)){
	$v +=($rowv['vote']);
}

$sql6="UPDATE `$tbl_name` SET `value` = $v WHERE `qid` = $id";

$result6=$db->query($sql6);


$repsql = "SELECT * FROM `$tbl_name3` WHERE `question_id` = $id";

$resrep=$db->query($repsql);
$rep=0;
while($rowrep=mysqli_fetch_array($resrep)){
	$rep ++;
}

$sqlr="UPDATE `$tbl_name` SET `reply` = $rep WHERE `qid` = $id";

$repss=$db->query($sqlr);


?>



</html>







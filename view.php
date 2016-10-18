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
$u_id = $rows['uid']; ?>

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
<?php
	$uname = $_SESSION['username'];
	$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` =  '".$uname. "'";
	$results=$db->query($sql1);
	$row=mysqli_fetch_array($results);
	$uid=$row['uid'];    ?>
    
<div class = "user">
	 <strong>Welcome, </strong> <?php echo $uname; ?>
    [<a href="index.php?action=logout">log out</a>]
</div>
<a href="index.php"><strong>Back to Main Page</strong> </a>
<div class="table">
<div class="heading "><strong><?php echo $rows['Title']; ?></strong></div>
<div class="viewcell">
<div class="vcell">
		<?php echo $rows['Description']; ?>
<br />
    <?php	$name = "Anon";
        $number = $rows['uid'];
        $sqli="SELECT username FROM `$tbl_name2` WHERE `uid`= $number";
        $res=$db->query($sqli);
        $row=mysqli_fetch_array($res);
        if (isset($row)){
		  $name=$row['username'];
		  }
        if($number == 0){
            $name="Anon";
			}
    ?>
    <strong>By :</strong> <?php echo $name; ?>
    <br />	
	<strong>Date/time : </strong><?php echo $rows['Date_created']; ?>
    </div>
    <br/>
    <?php
			$sql2="SELECT * FROM `$tbl_name3` WHERE `qid` = $id ORDER BY `Correct_Answer` DESC, `vote_count` DESC";
			$result2=$db->query($sql2);
			while($rowans=mysqli_fetch_array($result2)){?>
                <div class="vcell">
               <?php $id1=$rowans['uid'];
                $sqluser = "SELECT username FROM `$tbl_name2` WHERE `uid`= $id1";
                $resuser=$db->query($sqluser);
                $rowuser=mysqli_fetch_array($resuser);?>
                <strong>Answer</strong>:
                       <?php echo $rowans['Answer'];?>
                <br/>
                <strong>By</strong>:
                    <?php echo $rowuser['username'];    ?>
                <br/>
                <strong>Votes</strong>:
                       <?php echo $rowans['vote_count'];?>
                <br/>
                <strong>Posted On</strong>:
                       <?php echo $rowans['creation_date'];?>
                <br/>
                <?php $like= $rowans['aid'];
                if($u_id== $uid && $rowans['Correct_Answer']==0){?>
                        <a href="like.php?like=<?php echo $like; ?>&id=<?php echo $id; ?>">Like this Answer?</a>  
                    <?php }
                else if($rowans['Correct_Answer']==1){
                        echo "Liked this answer";}?>
                </div><br/>
        <?php  }	?>
<div class="tableanswer">
<form name="form1" method="post" action="add_answer.php">
<strong>Answer</strong>:
<textarea name="a_answer" cols="45" rows="3" id="a_answer"></textarea>
&nbsp;
&nbsp;
<input name="id" type="hidden" value="<?php echo $id; ?>">
<input name ="user" type="hidden" value="<?php echo $login; ?>">
<input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset">
</form>
</div>
</div>
</html>







<?php
session_start();
include_once "Db_Configure.php";
$tbl_name="questions";
$tbl_name2="users";
$tbl_name3="answer";
$db = new mysqli($host, $user,$pw,$db_name);
$a_id = $_GET['like'];
$q_id =$_GET['id'];
$likes = 1;
$z = 0;
$sreset = "UPDATE `$tbl_name3` SET `Correct_Answer` = $z WHERE `qid` = $q_id";
$reset =$db->query($sreset);
$slike= "UPDATE `$tbl_name3` SET `Correct_Answer` = $likes WHERE `aid` = $a_id ";
$results=$db->query($slike);
if($results)
{
	header("location:index.php");
}
else
{
	echo "ERROR";
	echo " ";
}
?>

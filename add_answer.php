<?php
session_start();


include_once "Db_Configure.php";
$tbl_name="questions";
$tbl_name2="users";
$tbl_name3="answer";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());
$id=$_POST['id'];
$usern = $_POST['user'];
$sqlid= "SELECT uid FROM `$tbl_name2` WHERE `username` = '".$usern. "'";
$nameres = $db->query($sqlid);
$rowname=mysqli_fetch_array($nameres);
$userid = $rowname['uid'];
$sql="SELECT Answer_Count FROM `$tbl_name` WHERE `qid`=$id";
$result= $db->query($sql);
$rows=mysqli_fetch_array($result);

$reply=$rows['Answer_Count'];
$a_answer=$_POST['a_answer'];

$a_answer=addslashes($a_answer);
$datetime=date("d/m/y H:i:s"); // create date and time 
$u_id = $_SESSION['id'];
echo $id;
$sql2="INSERT INTO `$tbl_name3`(`uid`,`qid`, `Answer`, `creation_date`)VALUES('$userid', '$id', '$a_answer', '$datetime')";
$result2=$db->query($sql2);
if($result2){
$reply = $reply +1;
$sql3="UPDATE `$tbl_name` SET `Answer_Count`= $reply WHERE `qid`= $id";
$result3=$db->query($sql3);
header("location:index.php");
}

else {
echo "ERROR";

}
?>
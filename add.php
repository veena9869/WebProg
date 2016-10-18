<?php

session_start();


include_once "Db_configure.php";

$tbl_name="questions";
$tbl_name2="users";
$tbl_name5="tags";
$tbl_name6="questag";


$db = new mysqli($host, $user,$pw,$db_name);// or die (mysql_error());

$topic=$_POST['topic'];
$topic = addslashes($topic);

$detail=$_POST['detail'];
$detail = addslashes($detail);

$datetime=date("d/m/y h:i:s");

$username = $_SESSION['username'];

$sql1="SELECT uid FROM `$tbl_name2` WHERE `username` = '".$username."'";

$result1=$db->query($sql1);

$row = mysqli_fetch_array($result1);

$userid= $row['uid'];

$_SESSION['id'] = $userid;

$sql="INSERT INTO `$tbl_name` (`uid`,`Title`,`Description`, `Date_created`)VALUES('$userid', '$topic', '$detail', '$datetime')";
$result=$db->query($sql);

$id = "SELECT qid FROM `$tbl_name` WHERE `Title` = '".$topic."'";
$resi =$db->query($id);
$rowi = mysqli_fetch_array($resi);
$ques = $rowi['qid'];
if($result){
header("location:index.php");
}
else
{
    echo "error";
}
?>


<?php
session_start();
include_once 'Db_Config.php';
$qid=$_POST['id'];
$conn= new mysqli($servername,$username,$password,$dbname);
$sql = "UPDATE question
			 SET q_title = '$_POST[title]',q_content = '$_POST[content]'
             where q_id =".$qid;


if($conn->query($sql)===TRUE)
{
    
    header("Location: Admin.php");
}
else
{
    echo "Connection Failed";
}

$conn->close();

?>

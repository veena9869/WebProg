<?php
session_start();
include_once 'Db_Config.php';

$conn= new mysqli($servername,$username,$password,$dbname);

$sql = "INSERT INTO question (q_asker,q_title, q_content)
					VALUES ('$_SESSION[username]','$_POST[title]', '$_POST[content]')";

if($conn->query($sql)===TRUE)
{
    header("Location:index.php");
}
else
{
    echo "Connection Failed";
}

$conn->close();

?>

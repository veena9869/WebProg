<?php
session_start();
include_once 'Db_Config.php';

$conn= new mysqli($servername,$username,$password,$dbname);
$title= htmlentities($_POST[title]);
$content=htmlentities($_POST[content]);

$sql = "INSERT INTO question (q_asker,q_title, q_content)
					VALUES ('$_SESSION[username]','$title', '$content')";

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

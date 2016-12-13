<?php
session_start();
include_once 'Db_Config.php';

$conn= new mysqli($servername,$username,$password,$dbname);
$title= htmlentities($_POST[title]);
$content=$_POST[content];
$tags = $_POST[tags];
$replace= " ";
$replacewith= "#";
$newtags = str_replace($replace,$replacewith,$tags);

$sql = "INSERT INTO question (q_asker,q_title, q_content,tags)
					VALUES ('$_SESSION[username]','$title', '$content','$newtags')";

if($conn->query($sql)===TRUE)
{
    header("Location:index.php");
}
else
{ echo $sql;
    echo "Connection Failed";
}

$conn->close();

?>

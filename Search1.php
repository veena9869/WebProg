<?php

 include_once 'Db_Config.php';
session_start();
        $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

$str = $_REQUEST["searchstr"];

$sql="SELECT * FROM `question` WHERE q_title LIKE '%".$str."%' ";  

$result = $conn->query($sql);      
$str = '';

if ( $result-> num_rows==0) {
  echo "No results";
}else{

  foreach ($result as $key => $value) {
   $str = $str.'<a href="Profile.php?var='.$value['q_title'].'">
       <h3>'.$value['q_title'].'</h3></a>';
  }
    
  echo '<div  name="questions" id="questions">
  <h2>Search Results</h2>'.$str.'
 </div>';
}

 ?>
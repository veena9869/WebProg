<?php

 include_once 'Db_Config.php';
        $conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
              }

$str = $_REQUEST["searchstr"];
//echo $like;
$sql="SELECT * from users where user_name like '%".$str."%' GROUP BY user_name";


              $result = $conn->query($sql);
                $res=mysqli_fetch_array($result);
                $row_count=mysqli_num_rows($result);



    


$str = '';

if ($row_count == 0) {
  echo "No results";
}else{

  foreach ($result as $key => $value) {
   $str = $str.'<a href="Profile.php?var='.$value['user_name'].'">
       <h3>'.$value['user_name'].'</h3></a>';
  }


  echo '<div  name="users" id="users">
  <h2>Search Results</h2>'.$str.'
 </div>';
}
 ?>

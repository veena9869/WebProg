<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Thronesrealm Type Display</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <nav class="navbar navbar-fixed-top navbar-inverse">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
			      <li><a href="profile.php">Profile Page</a></li>
            <li><a href="logForm.php">Login/Register</a></li>
            <li><a href="uploadBlob.php">Avatar</a></li>
            <li><a href="tagDisplay.php">Questions</a></li>
          </ul>
        </div>
      </div>
    </nav>
  </head>
  <body>
      <br>
      <br>
  </body>
</html>

<?php
	session_start();
	include_once 'Db_Config.php';
	$conn = new mysqli($servername, $username, $password, $dbname);	
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
		$sql = "SELECT * FROM question";
	echo '<br>
		  <div class="col-md-4 col-md-offset-2" >
          <table class="table table-striped">
          <thead>
            <tr>
            <th>Title</th>
            <th>Asker</th>
            <th>Value</th>
            </tr>
          </thead>
          <tbody>';
	if ($result = mysqli_query($conn,$sql))
	{
		while($row = mysqli_fetch_assoc($result))
		{
			 echo '<tr><td><a href="conversation.php?var=' . $row['q_id'] . '">' . $row['q_title'] . '</a></td><td>' . $row['q_asker'] .
			 '</td><td>' . $row['q_value'] . '</td></tr>';
		}
	}
	echo '</tbody>
          </table>
          </div> ';
		$conn->close();
?>

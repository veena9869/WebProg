
Conversation opened. 1 unread message.

Skip to content
Using Old Dominion University Mail with screen readers
Search



Click here to enable desktop notifications for Old Dominion University Mail.   Learn more  Hide
Mail
COMPOSE
Labels
Inbox (6)
Starred
Sent Mail
Drafts (34)
Job
More labels 
Hangouts

 
 
 
  More 
1 of 2,806  
 
Print all In new window
<no subject> 
Inbox
x 

Tipparti, Naina Sai <ntippart@cs.odu.edu>
Attachments11:50 PM (0 minutes ago)

to ANUSHA, MONICA, me 
 
2 Attachments 
 
	
Click here to Reply, Reply to all, or Forward
Using 0.92 GB
Manage
Program Policies
Powered by Google
Last account activity: 10 minutes ago
Open in 1 other location  Details
People (3)
Tipparti, Naina Sai
ntippart@cs.odu.edu

Show details


<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>Question & Answer Forum</title>

	<link rel="stylesheet" type="text/css" href="css/base.css" media="screen" />
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.95.3/js/materialize.min.js"></script>
	<style type="text/css">
        .body-content{
            background: white;
            max-width: 1024px;
            margin: auto;
            padding-left: 125px;
            margin-bottom: 100px;
            padding-bottom: 200px;

        }
        .q_content a{
            text-decoration: none;
            color: #005999;
        }

html {
    display: table;
    margin: auto;

}

body {

    vertical-align: middle;
}

        .q_box{
            width: 650px;

            background-color: white;
            height: auto;
            display: inline-block;

    background: #f2f2f2;

    -moz-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    -webkit-box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
    box-shadow: 0 4px 4px rgba(0, 0, 0, 0.4);
            margin-bottom: 8px;

        }
        .q_stats{
            float: left;
            width: 30%;
            padding: 5px;
            color: #8c8c8c;
        }
        .q_content{
            float: float;
            width: 65%;
            color: skyblue;
            font-weight: 100;
            font-size: 20px;
            margin-left: -20px;

        }
        .votes{
            float:left;
            margin-left: 10px;
        }
        .answers{
            margin-left: 10px;
            float: left;
        }
	</style>
</head>

<body>
	<?php
	session_start();
include "connectdb.php";
include "MainMenu.php";

	$query = mysqli_query($conn, "
	  SELECT *
	  FROM users
	  WHERE users.id = '".$_SESSION['uid']."'
	  LIMIT 1");

	$quesquery = mysqli_query($conn, "
	  SELECT *
	  FROM questions
	  WHERE questions.user_id = '".$_SESSION['uid']."'");

	function changeAvatarType($conn, $user, $type) {
		$sql = " UPDATE users SET avatar_type = '".$type."' WHERE id = '".$_SESSION["uid"]."';";
		$query = mysqli_query($conn, $sql);
	}

	function deleteAvatar($conn, $user) {
		$sql = " UPDATE users SET avatar_type = 0, avatar_id = 0 WHERE id = '".$_SESSION["uid"]."';";

		$query = mysqli_query($conn, $sql);
	}

	if($_POST && !empty($_POST['remove'])) {
	  $user = $_SESSION['uid'];
	  deleteAvatar($conn, $user);
		echo '<script type="text/javascript">
		window.location.href = "/qa/profile.php";</script>';
		}
	?>
    <div class = "body-content">

      <div class="container">
      <div id="display_results"></div>
			<h2>User</h2>
				<?php while($row = mysqli_fetch_assoc($query)): ?>
				<h4><?php echo $row['uname']; ?></h4>
			<?php endwhile; ?>
				<h4>Avatar</h4>

				<?php
				$query1 = 'SELECT avatar_type, avatar.filename FROM avatar LEFT JOIN users ON users.avatar_id = avatar.id WHERE users.id = '.$_SESSION['uid'];
					$result = mysqli_query($conn, $query1);
					while($row = mysqli_fetch_assoc($result)){
					 if($row['avatar_type'] == '0') {
						$imgname = $row['filename'];
						 $src = "<img src='/qa/avatars/".$imgname."'/>";
						echo $src;
					}
					}?>

          <h4>Change avatar</h4>
          <form method="post">
            <input type="submit" name="remove" value="Remove Avatar"/>
          </form>
          <br/>
          <form enctype="multipart/form-data" action="fileupload.php" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="30000">
            File: <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
          </form>
        <h2>Asked Questions</h2>
          <?php
          while($row = mysqli_fetch_array($quesquery)): ?>
          <div class="question">
            <p><?php
            $url = 'question.php?qid=' . $row['question_id'];
            $site_title = $row['q_title'];
            echo "<a href=$url>$site_title</a>" ?></p>
          </div>
        <?php endwhile?>
        <?php mysqli_close($conn);?>
      </div>
</div>
</body>
</html>
profile.php
Open with
Displaying fileupload.php.
<!DOCTYPE html>
<html>
<head>
	<title>New User Registration</title>
	<h1>New User Registration</h1>
    <meta charset="utf-8">
  <meta http-eqiuv="XUA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,intitail-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link href="register.css" rel="stylesheet">
</head> 
<style>

</style>
<body class="container" width=50%>
    <div class="jumbotron">
		<form action="register_user.php" method="post">
			<div>
				<label for="username"><strong>New Username: </strong></label>
				<input type="text" id="username" name="user_name" />
			</div>
            <div>
				<label for="password"><strong>Choose Password: </strong></label>
				<input type="password" id="password" name="user_pw" />
			</div>
            <div>
                <label for="email"><strong>Enter Email: </strong></label>
                <input type="email" id="email" name="email" />
            </div>
            

			<div class="button">
				<input class = "button" type="submit" name="register_submit" id="register_submit" value = "Register">
			</div>
		</form>
	  </div>	
	</body>
</html>




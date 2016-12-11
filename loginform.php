<!DOCTYPE html>
<html>
<head>
	<title>Thrones Realm </title>
	<meta charset="utf-8">
  <meta http-eqiuv="XUA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=device-width,intitail-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    <link href="login.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head> 
    
<body  class="container" >
    
<form id="login-form"  action="logIn.php" method="post">
    
    
    <label><b>Username</b></label>
    <input type="text" name="uname" id="username" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" name="pword" id="password" placeholder="Enter Password" name="psw" required>
    
    <div class="g-recaptcha" data-sitekey="6LfdOQ4UAAAAAOGd3HCMu9qFidN24h1ioAbgkS9d"></div>
                
    <input class = "button" type="submit" name="login-submit" id="login-submit" value = "Login">
    <a href="register.php"><button type="button" class="button1" class="btn btn-success">Register</button></a>
   
    
</form>
    

</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<title>Thrones Realm </title>
	<div id="navbar" class="collapse navbar-collapse">
		
	</div>
</head> 
<style>
form {
    border: 3px solid #f1f1f1;
	width : 500px;
	margin: auto;
    }

input[type=text], input[type=password] 
    {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    }

.button 
    {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    }
.button1 
    {
    background-color: #FF0000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    }
.cancelbtn
    {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
    }

.imgcontainer 
    {
    text-align: center;
    margin: 24px 0 12px 0;
    }

img.avatar 
    {
    width: 40%;
    border-radius: 50%;
    }

.container 
    {
    padding: 16px;
    }

span.psw 
    {
    float: right;
    padding-top: 16px;
    }


</style>
    
<body>


<form id="login-form"  action="logIn.php" method="post">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" name="uname" id="username" placeholder="Enter Username" name="uname" required>

    <label><b>Password</b></label>
    <input type="password" name="pword" id="password" placeholder="Enter Password" name="psw" required>
        
    <input class = "button" type="submit" name="login-submit" id="login-submit" value = "Login">
    <a href="register.php"><button type="button" class="button1">Register</button></a>
  </div>
</form>
</body>
</html>



<!DOCTYPE html>
<html>
<head>
	<title>Thrones Realm </title>
	<div id="navbar" class="collapse navbar-collapse">
		<ul class="nav navbar-nav">
			<li class="active"><a href="index.php">Home</a></li>
			<li><a href="profile.php">Profile Page</a></li>
			<li><a href="loginform.php">Login/Register</a></li> 
			<li><a href="uploadBlob.php">Avatar</a></li>
			<li><a href="tagDisplay.php">Archive</a></li>               
		</ul>
	</div>
</head> 
<style>
form {
    border: 3px solid #f1f1f1;
	width : 500px;
	margin: auto;
}

input[type=text], input[type=password] ,input[type=email]{
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.button1 {
    background-color: #FF0000;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
<body>
<h2>Register </h2>

<form action="register.php">

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>
		
	<label><b>Email</b></label>
	<input type="email" name="email" id="email" placeholder="Email Address" required>
	
    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
    <button type="submit">Register</button>
    
  </div>

</form>
</html>



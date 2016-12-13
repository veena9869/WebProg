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
    
<body >
<!--<form id="login-form"  action="logIn.php" method="post">-->
  
        <div style="margin-top:100px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign in to continue</strong>
					</div>
					<div class="panel-body">
						<form role="form" action="logIn.php" method="POST">
									<div class="col-sm-12 col-md-6  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" id="username" placeholder="Username" name="uname" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" id="password" placeholder="Password" name="pword" type="password" value="">
											</div>
										</div>
                                        <div class="form-group">
											<div class="input-group">
												<div class="g-recaptcha" data-sitekey="6LdYeg4UAAAAADj22GSMJPkrvXfzUQ5o__2fLqmM"></div>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" name="login-submit" id="login-submit" value="Sign in">
										</div>
									</div>
						</form>
					</div>
					<div class="panel-footer ">
						Don't have an account! <a href="register.php" onClick=""> Sign Up Here </a>
					</div>
                </div>
			</div>
		</div>
	</div>
    
</body>
</html>








<?php
$db = db();

function login() {
	global $template;
	$template->set('loginpage','1');
}

function view() {

	global $path;
	global $template;

	$userid = sanitize($path[2],"int");
    $db = db();
	$sql = ("select * from users where id = '".escape($userid)."'");
	$query = mysqli_query($db, $sql);
	$user = mysqli_fetch_array($query);

	$basePath = basePath();

	$template->set('user',$user);
}

function edit() {
	authenticate(1);
	global $template;
    $db = db();
	$sql = ("select * from users where id = '".escape($_SESSION['userid'])."'");
	$query = mysqli_query($db, $sql);
	$user = mysqli_fetch_array($query);
	$basePath = basePath();
	$template->set('user',$user);
}

function update() {
	authenticate(1);
	global $template;

	$name = sanitize($_POST['name'],"string");
	$email = sanitize($_POST['email'],"email");
	$password = sanitize($_POST['password'],"string");
	$password = sha1(SALT.$password.$name);

	if (!empty($_POST['password'])) {
        $db = db();
		$sql = ("update users set password = '".escape($password)."' where id = '".escape($_SESSION['userid'])."'");
		$query = mysqli_query($db,$sql);
	}

    $db = db();
	$sql = ("update users set name = '".escape($name)."', email = '".escape($email)."' where id = '".escape($_SESSION['userid'])."'");
	$query = mysqli_query($db,$sql);

	$slug = createslug($name);

	$basePath = basePath();
	header("Location: $basePath/users/view/{$_SESSION['userid']}/$slug");
}

function validate() {
	$name = sanitize($_POST['name'],"string");
	$email = sanitize($_POST['email'],"email");
	$password = sanitize($_POST['password'],"string");
	$password = sha1(SALT.$password.$name);
  $db = db();
	$sql = "select * from users where name = '".escape($name)."' and password = '".escape($password)."'";
	$query_result = mysqli_query($db,$sql);
	$user = mysqli_fetch_array($query_result);

	$basePath = basePath();

	if ($user['id'] > 0) {
		$_SESSION['userid'] = $user['id'];
		$_SESSION['name'] = $user['name'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['password'] = $user['password'];
		$_SESSION['points'] = $user['points'];

		if (!empty($_POST['returnurl'])) {
			$url = sanitize($_POST['returnurl'],"url");
			header("Location: {$url}");
		}  else {

			header("Location: $basePath");
		}
	} else {
		header("Location: $basePath/users/login");
	}
}

function register() {

}

function create() {
	$name = sanitize($_POST['name'],"string");
	$email = sanitize($_POST['email'],"email");
	$password = sanitize($_POST['password'],"string");
	$password = sha1(SALT.$password.$name);
  $db = db();
	$sql = ("insert into users (name,email,password,points,moderator,created,lastactivity) values ('".escape($name)."','".escape($email)."','".escape($password)."','1','0',NOW(),NOW())");
	$query = mysqli_query($db,$sql);

	validate();

}

function logout() {
	session_destroy();
	session_start();
	$_SESSION['userid'] = '';

}

function index() {
	global $template;
	$db = db();
	$sql = ("select count(id) count from users");
	$query = mysqli_query($db,$sql);
	$result = mysqli_fetch_array($query);
	$template->set('count',$result['count']);

	$sql = ("select * from users order by points desc, name asc");
	$query = mysqli_query($db,$sql);

	$users = array();

	while ($result = mysqli_fetch_array($query)) {
		$users[] = array ("id" => $result['id'], "name" => $result['name'], "points" => $result['points']);
	}

	$template->set('users',$users);

	/* Add Pagination Later */
}

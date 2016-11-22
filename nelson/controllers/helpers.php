<?php

function getUser($id) {
	global $helper;

	$id = sanitize($id,"int");
	$db = db();
	$sql = ("select * from users where id = '".escape($id)."'");
	$query = mysqli_query($db,$sql);
	$result = mysqli_fetch_array($query);

	$helper->set('user',$result);
	return $helper->render();
}

<?php

function index() {
	global $template;

	$db = db();
	$sql = ("select count(id) count from tags");
	$query = mysqli_query($db, $sql);
	$result = mysqli_fetch_array($query);
	$template->set('count',$result['count']);
    $db = db();
	$sql = ("select tag, count(tags_questions.questionid) tagcount from tags, tags_questions where tags.id = tags_questions.tagid group by tagid order by tagcount desc");
	$query = mysqli_query($db, $sql);

	$tags = array();

	while ($result = mysqli_fetch_array($query)) {
		$tags[] = array ("tag" => $result['tag'], "count" => $result['tagcount']);
	}

	$template->set('tags',$tags);

	/* Add Pagination Later */
}

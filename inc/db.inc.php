<?php
include_once("inc/configs.inc.php");
include_once("inc/user.class.php");

function connect() {
	$db = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME);
	return $db;
}

function getUsers() {
	$db = connect();
	$stmt = $db->stmt_init();
	$stmt->prepare("SELECT * FROM " . DATABASE_TABLE . " ORDER BY computing_id");
	$stmt->execute();
	$stmt->bind_result($computing_id, $completion_date);
	$rows = array();
	while($stmt->fetch()) {
		$rows[] = new User($computing_id, $completion_date);
	}
	$stmt->close();
	return $rows;
}

function getUser($computing_id) {
	$db = connect();
	$stmt = $db->stmt_init();
	$stmt->prepare("SELECT * FROM " . DATABASE_TABLE . " WHERE computing_id = ?");
 	$stmt->bind_param('s', $computing_id);
	$stmt->execute();
	$stmt->bind_result($computing_id, $completion_date);
	$rows = array();
	while($stmt->fetch()) {
		$rows[] = new User($computing_id, $completion_date);
	}
	$stmt->close();
	if (count($rows) == 0) {
		die("Unable to locate user record.");
	}
	$user = $rows[0];
	# determine if user is an administrator
	$stmt2 = $db->stmt_init();
	$stmt2->prepare("SELECT * FROM " . ADMINISTRATORS_TABLE . " WHERE computing_id = ?");
	$stmt2->bind_param('s', $computing_id);
	$stmt2->execute();
	while($stmt2->fetch()) {
		$user->setAdministrator(true);
	}
	$stmt2->close();
	return $user;
}

function updateCompletionDate($computing_id) {
	$db = connect();
	$stmt = $db->stmt_init();
	$stmt->prepare("UPDATE " . DATABASE_TABLE . " SET " . STATUS_FIELD . " = DATE(NOW()) WHERE computing_id = ?");
 	$stmt->bind_param('s', $computing_id);
	$stmt->execute();	
	$stmt->close();
}

?>
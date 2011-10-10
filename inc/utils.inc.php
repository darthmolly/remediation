<?php

function sendUserConfirmation($user) {
	$to = $user->getEmail();
	$subject = EMAIL_SUBJECT;
	$file = "partials/user_confirmation_email.inc.php";
	$handle = fopen($file, "r");
	$body = fread($handle, filesize($file));
	fclose($handle);
	$headers = "From: " . ADMIN_EMAIL;
	$extra = "-f" . ADMIN_EMAIL;
	mail($to, $subject, $body, $headers, $extra);
}

function sendAdminConfirmation($user) {
	$to = ADMIN_EMAIL;
	$subject = EMAIL_SUBJECT . " [" . $user->getComputingId() . "]";
	$file = "partials/admin_confirmation_email.inc.php";
	$handle = fopen($file, "r");
	$body = fread($handle, filesize($file));
	fclose($handle);
	$body = str_replace("{first_name}", $user->getFirstName(), $body);
	$body = str_replace("{last_name}", $user->getLastName(), $body);
	$body = str_replace("{computing_id}", $user->getComputingId(), $body);
	$headers = "From: " . ADMIN_EMAIL;
	$extra = "-f" . ADMIN_EMAIL;
	mail($to, $subject, $body, $headers, $extra);
}

function percentageComplete($users) {
	$total = count($users);
	if ($total == 0) {
		return "";
	}
	$complete = 0;
	foreach($users as $user) {
		if ($user->complete()) {
			$complete ++;
		}
	}
	return round($complete / $total * 100);
}

?>
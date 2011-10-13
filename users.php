<?php
include_once("inc/configs.inc.php");
include_once("inc/db.inc.php");
include_once("inc/utils.inc.php");
$user = getUser($_SERVER['PHP_AUTH_USER']);
$users = getUsers();
isset($_GET["excel"]) ? $doAsExcel = true : $doAsExcel = false;

if ($doAsExcel) {
	$filename = "remediation-results.xls";
	Header("Content-Type: application/vnd.ms-excel");
	Header("Content-Disposition: attachment; filename=\"$filename\"");
} else {
	include("partials/header.inc.php"); 
	print "<div class=\"excel\"><a href=\"" . $_SERVER['PHP_SELF'] . "?excel=true\">Save in Excel file format</a></div>";
}

if (!$user->isAdministrator()) {
	 die("You are not an authorized administrator");
}

if (!$doAsExcel) {
	print "<div class=\"percent\">Percent complete: " . percentageComplete($users) . "%</div>";
}

include("partials/users.inc.php");

if (!$doAsExcel) { 
	include("partials/footer.inc.php"); 
} 
?>
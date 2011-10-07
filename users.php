<?php
include_once("inc/configs.inc.php");
include_once("inc/db.inc.php");
$user = getUser($_SERVER['PHP_AUTH_USER']);
isset($_GET["excel"]) ? $doAsExcel = true : $doAsExcel = false;

if ($doAsExcel) {
	$filename = "remediation-results.xls";
	Header("Content-Type: application/vnd.ms-excel");
	Header("Content-Disposition: attachment; filename=\"$filename\"");
} else {
	include("partials/header.inc.php"); 
	print "<div class=\"excel\"><a href=\"" . $_SERVER['PHP_SELF'] . "?excel=true\">View in Excel</a></div>";
}

$user->isAdministrator() ? include("partials/users.inc.php") : die("You are not an authorized administrator");

if (!$doAsExcel) { 
	include("partials/footer.inc.php"); 
} 
?>
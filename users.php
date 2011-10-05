<?php
include_once("inc/configs.inc.php");
include_once("inc/db.inc.php");
$user = getUser($_SERVER['PHP_AUTH_USER']);
include("partials/header.inc.php"); 
?>

<?php $user->isAdministrator() ? include("partials/users.inc.php") : die("You are not an authorized administrator") ?>

<?php include("partials/footer.inc.php"); ?>
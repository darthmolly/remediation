<?php
include_once("inc/configs.inc.php");
include_once("inc/db.inc.php");
$user = getUser($_SERVER['PHP_AUTH_USER']);
include("partials/header.inc.php"); 
?>

<?php
if (!$user) {
	include("partials/not_found.inc.php");
} else if (isset($_POST["complete"])) {
	updateCompletionDate($user->getComputingId());
	include("partials/done.inc.php");
} else {
	 $user->complete() ? include("partials/complete.inc.php") : include("partials/incomplete.inc.php");
}
?>


<?php if ($user && $user->isAdministrator()) { ?>
	<p><a href="users.php">View All Users</a></p>
<?php } ?>

<?php include("partials/footer.inc.php"); ?>
<table border="1" cellspacing="0" cellpadding="3">
	<tr><th>Computing ID</th><th>Last Name</th><th>First Name</th><th>Completion date</th></tr>
<?php

foreach($users as $user) {
	
	print "<tr>";
	print "<td>" . $user->getComputingId() . "</td>";
	print "<td>" . $user->getLastName() . "</td>";
	print "<td>" . $user->getFirstName() . "</td>";
	print "<td>";
	$user->complete() ? print $user->getCompletionDate() : print "";
	print "</td>";
	print "</tr>";
}

?>
</table>
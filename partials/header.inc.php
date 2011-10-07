<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

  <head>
    <title><?php print APPLICATION_NAME; ?></title>
  
    <link type='text/css' rel='stylesheet' media='screen' href='partials/style.css' />

  </head>
  <body>
		<h2><?php print APPLICATION_NAME; ?></h2>
		<?php if ($user) { ?>
			<h3><?php print $user->getFirstName(); ?> <?php print $user->getLastName(); ?> (<?php print $user->getComputingID();?>)</h3>
		<?php } ?>
		<div id="content"><!-- begin #content -->
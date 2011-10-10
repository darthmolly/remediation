<?php

$constants = array(
  "APPLICATION_NAME"    =>  "SSN Remediation",        # this will be the page title and the header for each page
  "ADMIN_EMAIL"         =>  "mst3k@virginia.edu",     # the email address where confirmation emails are sent
  "EMAIL_SUBJECT"  			=> "Remediation Confirmation",# subject line of confirmation emails
  "DATABASE_HOST"       =>  "localhost",              # your database server
  "DATABASE_NAME"       =>  "remediation",            # the name of your database
  "DATABASE_USER"       =>  "remediator",             # the database username
  "DATABASE_PASSWORD"   =>  "remediate",              # the database password
  "DATABASE_TABLE"      =>  "users",                  # the database table -- no need to change unless you modified the schema
  "USER_FIELD"          =>  "computing_id",           # the user identifier field -- no need to change unless you modified the schema
  "STATUS_FIELD"        => "completion_date",         # the completion date field -- no need to change unless you modified the schema
  "ADMINISTRATORS_TABLE" => "administrators"          # the administrators table -- no need to change unless you modified the schema
);

foreach ($constants as $name => $value) {
  define($name, $value);
}

?>
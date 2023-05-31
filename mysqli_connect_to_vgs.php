<?php

// Set the database access information as constants.
//DEFINE ('DB_USER', 'onathav2_guest');
//DEFINE ('DB_PASSWORD', 'p3&FgF@YBB$I');
//DEFINE ('DB_HOST', 'localhost');
//DEFINE ('DB_NAME', 'onathav2_vgs');

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'vgs');
// Make the connnection, select the database and assign the connection script the $dbc.
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

?>

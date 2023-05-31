<?php

// Include the connection script to establish the database connection
include ('mysqli_connect_to_vgs.php');


echo "<form action='index.php' method='post'>
<input type=\"submit\" value=\"Return to Home\">
</form>";

echo "<form action='vgs.php' method='post'>
<input type=\"submit\" value=\"View\">
</form>";


error_reporting(E_ALL ^ E_NOTICE);

$name = $_POST['name'];
$year = $_POST['year'];
$genre = $_POST['genre'];
$platform = $_POST['platform'];
$publisher = $_POST['publisher'];

echo $name, " has been deleted.";

// Assign the query string to the variable $query
$query = "DELETE FROM info WHERE Name = '$name'";



// Run the query against the connection $dbc
$result = @mysqli_query ($dbc, $query) or die(mysqli_error($dbc));

?>
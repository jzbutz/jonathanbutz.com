<?php

// Include the connection script to establish the database connection
include ('mysqli_connect_to_vgs.php');

// Assign the query string to the variable $query
$query = "SELECT info.Name, info.Platform, info.Year, info.Genre, info.Publisher FROM info";

error_reporting(E_ALL ^ E_NOTICE);

$genre = $_POST['genre'];

// Run the query against the connection $dbc
$result = @mysqli_query ($dbc, $query) or die(mysqli_error($dbc));

echo "<form action='index.php' method='post'>
<input type=\"submit\" value=\"Return to Home\">
</form>";

echo "<form action='vgs2.php' method='post'>
<input type=\"submit\" value=\"Add\">
</form>";

echo "<form action='vgs3.php' method='post'>
<input type=\"submit\" value=\"Delete\">
</form>";


// Display the query results in an HTML table sturucture
echo '<table>
		<tr><td>Name</td><td>Platform</td><td>Year</td><td>Genre</td><td>Publisher</td></tr>';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
			echo '<tr><td align="left">'.$row['Name'].'</td><td align="left">'.$row['Platform'].'</td><td align="left">'.$row['Year'].'</td><td align="left">'.$row['Genre'].'</td><td align="left">'.$row['Publisher'].'</td>
			        <td><form action="delete.php" method="post"><input type="submit" value="Delete"></form></td>
			</tr>';

	}

echo '</table>';

?>
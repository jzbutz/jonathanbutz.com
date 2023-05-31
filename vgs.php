<!DOCTYPE html>
<html>


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
?>
<br>
<?php
echo "<form action='add.php' method='post'>
<input type=\"submit\" value=\"Add New Game\">
</form>";
?>
<br>
<?php
echo "<form action='vgs.php' method='post'>
<select name='genre' id='genre'>
	<option value='Sports'>Sports</option>
	<option value='Platform'>Platform</option>
	<option value='Shooter'>Shooter</option>
	<option value='Puzzle'>Puzzle</option>
	<option value='Racing'>Racing</option>
	<option value='Misc'>Misc</option>
	<option value='Role-Playing'>Role-Playing</option>
	<option value='Action'>Action</option>
	<option value='Fighting'>Fighting</option>
	<option value='Simulation'>Simulation</option>
</select>
<input type=\"submit\" value=\"Sort by Genre\">

</form>";

?>
<br>
<?php


// Display the query results in an HTML table sturucture
echo '<table>
		<tr><td>Name</td><td>Platform</td><td>Year</td><td>Genre</td><td>Publisher</td></tr>';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
		if ($genre == $row['Genre'])
		{
			?>
			<tr><td align="left"><?php echo $row['Name']; ?></td><td align="left"><?php echo $row['Platform']; ?></td><td align="left"><?php echo $row['Year']; ?></td><td align="left"><?php echo $row['Genre']; ?></td><td align="left"><?php echo $row['Publisher']; ?></td>
			<td><form action="edit.php" method="post"><input type="submit" value="Edit">
			<input type="hidden" name="name" value= <?php echo $row['Name']; ?> /> 
			<input type="hidden" name="platform" value= <?php echo $row['Platform']; ?> /> 
			<input type="hidden" name="year" value= <?php echo $row['Year']; ?> /> 
			<input type="hidden" name="genre" value= <?php echo $row['Genre']; ?> /> 
			<input type="hidden" name="publisher" value= <?php echo $row['Publisher']; ?> /> 
			</form></td>
			
			<td><form action="delete.php" method="post"><input type="submit" value="Delete">
			<input type="hidden" name="name" value= <?php echo $row['Name']; ?> /> 
			<input type="hidden" name="platform" value= <?php echo $row['Platform']; ?> /> 
			<input type="hidden" name="year" value= <?php echo $row['Year']; ?> /> 
			<input type="hidden" name="genre" value= <?php echo $row['Genre']; ?> /> 
			<input type="hidden" name="publisher" value= <?php echo $row['Publisher']; ?> /> 
			</form></td>

			<?php
		}
	}

echo '</table>';

?>

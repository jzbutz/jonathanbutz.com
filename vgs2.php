<?php

echo "<form action='index.php' method='post'>
<input type=\"submit\" value=\"Return to Home\">
</form>";

echo "<form action='vgs.php' method='post'>
<input type=\"submit\" value=\"View\">
</form>";

?>


<form  method="POST" action="vgs2.php" id="adddb" name="adddb">
    <!-- Name input-->
    <div class="form-floating mb-3">
		<label for="name">Name</label>
        <input class="form-control" id="name" type="text" required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('A name is required.')" name ="name[0]"/>
    </div>

    <!-- Email address input-->
    <div class="form-floating mb-3">
		<label for="platform">Platform</label>
        <input class="form-control" id="platform" type="text"  required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Email is not valid.')" name ="name[1]"/>
        
    </div>
	<!-- Email address input-->
    <div class="form-floating mb-3">
		<label for="year">Year</label>
        <input class="form-control" id="year" type="text"  required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Email is not valid.')" name ="name[2]"/>
    </div>
		<!-- Email address input-->
    <div class="form-floating mb-3">
		<label for="genre">Genre</label>
        <input class="form-control" id="genre" type="text"  required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Email is not valid.')" name ="name[3]"/>
    </div>
		<!-- Email address input-->
    <div class="form-floating mb-3">
		<label for="publisher">Publisher</label>
        <input class="form-control" id="publisher" type="text"  required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Email is not valid.')"name ="name[4]"/>
    </div>
		<!-- Email address input-->
    <div class="form-floating mb-3">
		<label for="sales">Sales</label>
        <input class="form-control" id="sales" type="text"  required="required" oninput="this.setCustomValidity('')" oninvalid="this.setCustomValidity('Email is not valid.')" name ="name[5]"/>
    </div>
    <!-- Submit Button-->
		<br>
        <button class="btn btn-primary btn-xl enabled" id="submitButton" type="">Send</button> <!-- type="submit" -->
		<head>				
</form>

<?php
error_reporting(E_ALL ^ E_NOTICE);

$name = $_POST['name'];

// Include the connection script to establish the database connection
include ('mysqli_connect_to_vgs.php');

// Assign the query string to the variable $query

$sql = "INSERT INTO info (Name, Platform, Year, Genre, Publisher)
VALUES ('$name[0]', '$name[1]', '$name[2]', '$name[3]', '$name[4]')";

error_reporting(E_ALL ^ E_NOTICE);

// Run the query against the connection $dbc
$result = @mysqli_query ($dbc, $sql) or die(mysqli_error($dbc));

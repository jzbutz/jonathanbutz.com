<?php

// Include the connection script to establish the database connection
include ('mysqli_connect_to_vandelay.php');

// Assign the query string to the variable $query
$query = "SELECT orders.order_id, DATE_FORMAT(orders.order_date, '%m/%d/%Y') as date, CONCAT(customers.customer_first_name,' ', customers.customer_last_name) AS name,
CONCAT(clerks.clerk_first_name,' ', clerks.clerk_last_name) AS clerkname, orders.clerk_id FROM orders INNER JOIN customers ON orders.customer_id = customers.customer_id 
INNER JOIN clerks ON orders.clerk_id = clerks.clerk_id";

// Run the query against the connection $dbc
$result = @mysqli_query ($dbc, $query) or die(mysqli_error($dbc));


// Display the query results in an HTML table sturucture
echo '<table>
		<tr><td>Order ID</td><td>Date</td><td>Customer</td><td>Clerk</td></tr>';

while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
	{
echo '<tr><td align="right">'.$row['order_id'].'</td><td align="left">'.$row['date'].'</td><td align="left">'.$row['name'].'</td><td align="left">'.$row['clerkname'].'</td></tr>';
	}

echo '</table>';

?>
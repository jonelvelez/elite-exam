<?php

include_once("connection/dbconnection.php");

$db = new DBconnection();
$conn = $db->connection();
// Query to select the top 10 albums based on sales
$sql = "SELECT `COL 1` AS Album, `COL 3` AS Sales FROM data_reference__album_sales_ ORDER BY `COL 3` DESC LIMIT 10";

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

echo "<table border='1'>";
echo "<tr><th>Album</th><th>Sales</th></tr>";

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Album'] . "</td>";
    echo "<td>" . $row['Sales'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($conn);
?>
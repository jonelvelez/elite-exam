<?php 

include_once("connection/dbconnection.php");

$db = new DBconnection();
$conn = $db->connection();

$sql = "SELECT `COL 2` AS Artist, SUM(`COL 3`) AS TotalSales FROM data_reference__album_sales_ GROUP BY `COL 2` ORDER BY TotalSales DESC LIMIT 1";

$result = mysqli_query($conn, $sql);

if(!$result) {

    die("Query failed: " . mysqli_error($conn));

} 

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo "Top Artist: " . $row['Artist'] . ", Total Sales: " . $row['TotalSales'];
} else {
    echo "No data found.";
}


mysqli_close($conn);

?>
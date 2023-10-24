<?php 

include_once("connection/dbconnection.php");

$db = new DBconnection();
$conn = $db->connection();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Album Search</title>
</head>
<body>
    <h1>Album Search</h1>
    
    <!-- Search form -->
    <form method="post" action="">
        <input type="text" name="artist" placeholder="Search for an artist">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form was submitted


        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $searchedArtist = $_POST["artist"];

        // Query to select albums by the searched artist
        $sql = "SELECT `COL 1` AS Album, `COL 2` AS Artist, `COL 3` AS Sales 
                FROM data_reference__album_sales_ 
                WHERE `COL 2` LIKE '%$searchedArtist%'";

        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }

        echo "<h2>Results for artist: $searchedArtist</h2>";

        echo "<table border='1'>";
        echo "<tr><th>Album</th><th>Artist</th><th>Sales</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['Album'] . "</td>";
            echo "<td>" . $row['Artist'] . "</td>";
            echo "<td>" . $row['Sales'] . "</td>";
            echo "</tr>";
        }

        echo "</table>";

        mysqli_close($conn);
    }
    ?>

</body>
</html>
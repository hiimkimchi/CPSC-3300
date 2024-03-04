<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="assets/table.css">
    <link rel="stylesheet" href="assets/root.css">
</head>
<body>
    <header>
        <h1>Hands Up</h1>
    </header>
    <section id="venue" class="container">
        <?php
        // Ensure this path is correct relative to this file's location
        include('config/database.php');

        // Execute SQL query to fetch data from VENUE table
        $result = $conn->query("SELECT * FROM VENUE");

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead><tr class='color'><th class='th'>Venue ID</th><th class='th'>Venue Name</th><th class='th'>Venue Address</th><th class='th'>Venue Zip Code</th><th class='th'>Venue Phone Number</th></tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['VenueID']) . "</td><td class='td'>" . htmlspecialchars($row['VenueName']) . "</td><td class='td'>" . htmlspecialchars($row['VenueAddress']) . "</td><td class='td'>" . htmlspecialchars($row['VenueZipCode']) . "</td><td class='td'>" . htmlspecialchars($row['VenuePhoneNumber']) . "</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found in VENUE table";
        }
        $conn->close();
        ?>
    </section>

    

    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
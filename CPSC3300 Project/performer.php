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
    <section id="performer" class="container">
        <?php
        include('config/database.php'); // Ensure this path is correct relative to this file's location

        // Execute SQL query to fetch data from PERFORMER table
        $result = $conn->query("SELECT * FROM PERFORMER");

        if ($result->num_rows > 0) {
            // Generate HTML table for PERFORMER
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='color'><th class='th'>Performer ID</th><th class='th'>Performer Name</th><th class='th'>Performer Genre</th><th class='th'>Performer Setlist</th><th class='th'>Performer Type</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='tr'>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerID']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerName']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerGenre']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerSetlist']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerType']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found in PERFORMER table";
        }
        $conn->close(); // Close the connection
        ?>
    </section>
    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
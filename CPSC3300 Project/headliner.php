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
    <section id="headliner" class="container">
        <?php
        include('config/database.php'); // Ensure this path is correct relative to this file's location

        // Execute SQL query to fetch data from HEADLINER table
        $result = $conn->query("SELECT * FROM HEADLINER");

        if ($result->num_rows > 0) {
            // Generate HTML table for HEADLINER
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='color'><th class='th'>Performer ID</th><th class='th'>Headliner Light Show</th><th class='th'>Headliner Visuals</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='tr'>";
                echo "<td class='td'>" . htmlspecialchars($row['PerformerID']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['HeadlinerLightShow']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['HeadlinerVisuals']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found in HEADLINER table";
        }
        $conn->close(); // Close the connection
        ?>
    </section>

    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
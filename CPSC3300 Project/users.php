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

    <section id="table" class="container">
        <?php
        include('config/database.php'); // Ensure this path is correct relative to this file's location

        // Execute SQL query to fetch data from USERS table
        $result = $conn->query("SELECT * FROM USERS");

        if ($result->num_rows > 0) {
            // Generate HTML table
            echo "<table class='table'>";
            echo "<thead>";
            echo "<tr class='color'><th class='th'>User ID</th><th class='th'>User Name</th><th class='th'>User Email</th><th class='th'>User First Name</th><th class='th'>User Last Name</th></tr>";
            echo "</thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='tr'>";
                echo "<td class='td'>" . htmlspecialchars($row['UserID']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['UserName']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['UserEmail']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['UserFirstName']) . "</td>";
                echo "<td class='td'>" . htmlspecialchars($row['UserLastName']) . "</td>";
                echo "</tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found in USERS table";
        }
        $conn->close(); // Close the connection
        ?>
    </section>

    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
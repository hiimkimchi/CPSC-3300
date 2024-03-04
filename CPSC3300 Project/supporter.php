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
    
    <section id="supporter" class="container">
        <?php
        include('config/database.php');

        $result = $conn->query("SELECT * FROM SUPPORTER");

        if ($result->num_rows > 0) {
            echo "<table class='table'>";
            echo "<thead><tr class='color'><th class='th'>Performer ID</th><th class='th'>Supporter Requests</th></tr></thead><tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['PerformerID']) . "</td><td class='td'>" . htmlspecialchars($row['SupporterRequests']) . "</td></tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "No data found in SUPPORTER table";
        }
        $conn->close();
        ?>
    </section>

    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
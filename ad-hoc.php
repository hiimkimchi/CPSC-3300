<?php
    include('config/establish_connection.php');
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $inputQuery = $_POST["query"];
    }

    $prefix = $_POST["action"];
    switch($prefix) {
        case 'select':
            $prefix = "SELECT ";
            break;
        case 'insert into':
            $prefix = "INSERT INTO ";
            break;
        case 'update':
            $prefix = "UPDATE ";
            break;
        case 'delete from':
            $prefix = "DELETE FROM ";
            break;
    }

    $inputQuery = $prefix . $inputQuery;

    $returnVal = $conn->query($inputQuery);

    if ($returnVal) {
        // Display the results
        echo "<h2>Query Results</h2>";
        echo "<table border='1'>";
        // Fetching data and displaying it in a table
        while ($row = $returnVal->fetch_assoc()) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>" . $value . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        // Display error message if query execution fails
        echo "Error executing query: " . $conn->error;
    }
?>
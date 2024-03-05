<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HandsUp</title>
    <link rel="stylesheet" href="assets/table.css">
    <link rel="stylesheet" href="assets/root.css">
</head>
<body bgcolor="ffffff"> 
<body?>
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
            echo "<h2>Ad-hoc Query: </h2>";
            echo "<table border='3'>";
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
            echo "No data found";
            echo "Query Error: " . $conn->error;
        }
    ?>
</body>
</html>
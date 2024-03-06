// ad-hoc.php
// Provides script for the ad-hoc queries to allow users to input their own queries

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
        // allows connection to be established already
        include('config/establish_connection.php');

        // checks which method is used in the HTML page and returns the textbox entry
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputQuery = $_POST["query"];
        }

        // checks the box selections and inputs it into the inputQuery
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

        // executes query on server
        $returnVal = $conn->query($inputQuery);

        // if the query result isnt empty, prints out the table properly
        if ($returnVal) {
            echo "<h2>Ad-hoc Query: </h2>";
            echo "<table border='3'>";
            // while loop to properly display table using HTML tags
            while ($row = $returnVal->fetch_assoc()) {
                echo "<tr>";
                foreach ($row as $value) {
                    echo "<td>" . $value . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            // error message for if query result is empty
            echo "No data found";
            echo "Query Error: " . $conn->error;
        }
    ?>
</body>
</html>

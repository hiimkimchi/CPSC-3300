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
        // ad-hoc.php
        // Provides script for the ad-hoc queries to allow users to input their own queries
        include('config/establish_connection.php');
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $inputQuery = $_POST["query"];
        }

        // checks the box selections and inputs it into the inputQuery
        $prefix = $_POST["action"];
        $isDisplayed;

        switch($prefix) {
            case 'select':
                $prefix = "SELECT ";
                $isDisplayed = 1;
                break;
            case 'insert into':
                $prefix = "INSERT INTO ";
                $isDisplayed = 0;
                break;
            case 'update':
                $prefix = "UPDATE ";
                $isDisplayed = 0;
                break;
            case 'delete from':
                $prefix = "DELETE FROM ";
                $isDisplayed = 0;
                break;
        }

        $inputQuery = $prefix . $inputQuery;

        $returnVal = $conn->query($inputQuery);

        if ($isDisplayed == 1) {

            if ($returnVal && $returnVal->num_rows > 0) {
                // Display the results
                echo "<h2>Ad-hoc Query: </h2>";
                echo "<table class='table'>";
                
                // Fetch the first row to get column names for table headers
                $firstRow = $returnVal->fetch_assoc();
                
                // Generate table headers
                echo "<thead><tr class='color'>";
                foreach ($firstRow as $column => $value) {
                    echo "<th class='th'>" . htmlspecialchars($column) . "</th>";
                }
                echo "</tr></thead><tbody>";
                
                // Output the first row
                echo "<tr class='tr'>";
                foreach ($firstRow as $value) {
                    echo "<td class='td'>" . htmlspecialchars($value) . "</td>";
                }
                echo "</tr>";

                // Fetching the rest of the data and displaying it in table rows
                while ($row = $returnVal->fetch_assoc()) {
                    echo "<tr class='tr'>";
                    foreach ($row as $value) {
                        echo "<td class='td'>" . htmlspecialchars($value) . "</td>";
                    }
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                // Display error message if query execution fails
                echo "No data found";
                echo "Query Error: " . $conn->error;
            }
        } else {
            if (!empty($conn->error)) {
                echo " No data found";
                echo " Query Error: " . $conn->error;
            } else {
                echo " Executed Successfully";
            }
        }
    ?>
</body>
</html>

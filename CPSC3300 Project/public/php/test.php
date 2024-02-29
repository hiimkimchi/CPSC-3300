<?php
    include('database.php');

    // Execute SQL query to fetch data from USERS table
    $result = $conn->query("SELECT * FROM USERS");

    if ($result->num_rows > 0) {
    // Generate HTML table
    echo "<table border='1'>";
    echo "<tr><th>User ID</th><th>User Name</th><th>User Email</th><th>User First Name</th><th>User Last Name</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['UserID'] . "</td>";
        echo "<td>" . $row['UserName'] . "</td>";
        echo "<td>" . $row['UserEmail'] . "</td>";
        echo "<td>" . $row['UserFirstName'] . "</td>";
        echo "<td>" . $row['UserLastName'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    } else {
        echo "No data found in USERS table";
    }
        //Close the Connection
        $conn->close();
?>
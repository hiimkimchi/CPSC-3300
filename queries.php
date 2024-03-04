<?php
// Include database connection
include('config/establish_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Query Results</title>
    <link rel="stylesheet" href="assets/table.css">
    <link rel="stylesheet" href="assets/root.css">
</head>
<body>

<?php

// Check if the 'action' GET parameter is set
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'concert_reviews':
            echo "<main><section id='table' class='container'><h2>Concert Reviews</h2>";

            $concertID = $_GET['concertID'] ?? 'D08F897678'; // Default or GET parameter
            $query = "SELECT R.ReviewID, R.ReviewParagraph, R.ReviewScore, U.UserName, U.UserEmail
                      FROM REVIEW R
                      INNER JOIN USERS U ON R.UserID = U.UserID
                      WHERE R.ConcertID = ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $concertID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr class='color'><th class='th'>Review ID</th><th class='th'>Review</th><th class='th'>Score</th><th class='th'>User Name</th><th class='th'>User Email</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['ReviewID']) . "</td><td class='td'>" . htmlspecialchars($row['ReviewParagraph']) . "</td><td class='td'>" . htmlspecialchars($row['ReviewScore']) . "</td><td class='td'>" . htmlspecialchars($row['UserName']) . "</td><td class='td'>" . htmlspecialchars($row['UserEmail']) . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No reviews found for concert ID $concertID";
            }

            echo "</section></main>";
            break;

        // Add more cases for other queries here
        case 'no_reviews':
            echo "<main><section id='table' class='container'><h2>Concerts with No Reviews</h2>";
            $query = "SELECT C.ConcertID, C.ConcertType, C.ConcertGenre
                      FROM CONCERT C
                      LEFT JOIN REVIEW R ON C.ConcertID = R.ConcertID
                      WHERE R.ReviewID IS NULL";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr class='color'><th class='th'>Concert ID</th><th class='th'>Concert Type</th><th class='th'>Concert Genre</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['ConcertID']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertType']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertGenre']) . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "All concerts have reviews.";
            }
            echo "</section></main>";
            break;

        case 'total_concerts':
            echo "<main><section id='table' class='container'><h2>Total Concerts by Venue</h2>";
            $query = "SELECT V.VenueID, V.VenueAddress, COUNT(C.ConcertID) AS TotalConcerts
                      FROM VENUE V
                      JOIN CONCERT C ON V.VenueID = C.VenueID
                      GROUP BY V.VenueID, V.VenueAddress";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                echo "<table class='table'><thead><tr class='color'><th class='th'>Venue ID</th><th class='th'>Venue Address</th><th class='th'>Total Concerts</th></tr></thead><tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['VenueID']) . "</td><td class='td'>" . htmlspecialchars($row['VenueAddress']) . "</td><td class='td'>" . htmlspecialchars($row['TotalConcerts']) . "</td></tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "No data found.";
            }
            echo "</section></main>";
            break;

        case 'average_score':
            $concertID = $_GET['concertID'] ?? ''; // Assume a dynamic ID is passed
            if (!$concertID) {
                echo "<main><section><p>Please specify a concert ID.</p></section></main>";
                break;
            }

            echo "<main><section id='table' class='container'><h2>Average Score for Concert ID: $concertID</h2>";
            $query = "SELECT AVG(REVIEW.ReviewScore) AS AverageScore
                      FROM REVIEW
                      WHERE ReviewScore IS NOT NULL AND ConcertID = ?";

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $concertID);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();

            if ($result && $result['AverageScore'] !== null) {
                echo "<div class='content'><p>Average Score: " . round($result['AverageScore'], 2) . "</p></div>";
            } else {
                echo "<div class='content'><p>No reviews or scores found for this concert.</p></div>";
            }
            echo "</section></main>";
            break;

        default:
            echo "<main><section><p>Select a valid query to run.</p></section></main>";
            break;
    }

    $conn->close();
} else {
    echo "<main><section><p>No action specified.</p></section></main>";
}
?>
</body>
</html>
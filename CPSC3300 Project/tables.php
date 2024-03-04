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
    <section id="media" class="container">
        <?php
        include('config/establish_connection.php'); // Ensure this path is correct relative to this file's location

        if(isset($_GET['action'])) {
            $action = $_GET['action'];

            switch($action) {
                case 'users':
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
                    break;

                case 'venue':
                    // Execute SQL query to fetch data from VENUE table
                    $result = $conn->query("SELECT * FROM VENUE");

                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr class='color'><th class='th'>Venue ID</th><th class='th'>Venue Name</th><th class='th'>Venue Address</th><th class='th'>Venue Zip Code</th><th class='th'>Venue Phone Number</th></tr></thead><tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['VenueID']) . "</td><td class='td'>" . htmlspecialchars($row['VenueName']) . "</td><td class='td'>" . htmlspecialchars($row['VenueAddress']) . "</td><td class='td'>" . htmlspecialchars($row['VenueZipCode']) . "</td><td class='td'>" . htmlspecialchars($row['VenuePhoneNumber']) . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "No data found in VENUE table";
                    }
                    break;

                case 'media':
                    // Execute SQL query to fetch data from MEDIA table
                    $result = $conn->query("SELECT * FROM MEDIA");

                    if ($result->num_rows > 0) {
                        // Generate HTML table for MEDIA
                        echo "<table class='table'>";
                        echo "<thead>";
                        echo "<tr class='color'><th class='th'>Media ID</th><th class='th'>Media Type</th><th class='th'>Media Length</th><th class='th'>Media Origin Date</th></tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tr'>";
                            echo "<td class='td'>" . htmlspecialchars($row['MediaID']) . "</td>";
                            echo "<td class='td'>" . htmlspecialchars($row['MediaType']) . "</td>";
                            echo "<td class='td'>" . htmlspecialchars($row['MediaLength']) . "</td>";
                            echo "<td class='td'>" . htmlspecialchars($row['MediaOriginDate']) . "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "No data found in MEDIA table";
                    }
                    break;

                case 'performer':
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
                    break;

                case 'headliner':
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
                    break;

                case 'supporter':
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
                    break;
                
                case 'festival':
                    $result = $conn->query("SELECT * FROM FESTIVAL");

                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr class='color'><th class='th'>Festival ID</th><th class='th'>Venue ID</th><th class='th'>Performer ID</th><th class='th'>Festival Start</th><th class='th'>Festival End</th><th class='th'>Festival Description</th></tr></thead><tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['FestivalID']) . "</td><td class='td'>" . htmlspecialchars($row['VenueID']) . "</td><td class='td'>" . htmlspecialchars($row['PerformerID']) . "</td><td class='td'>" . htmlspecialchars($row['FestivalStart']) . "</td><td class='td'>" . htmlspecialchars($row['FestivalEnd']) . "</td><td class='td'>" . htmlspecialchars($row['FestivalDescription']) . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "No data found in FESTIVAL table";
                    }
                    break;

                case 'concert':
                    $result = $conn->query("SELECT * FROM CONCERT");

                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr class='color'><th class='th'>Concert ID</th><th class='th'>Venue ID</th><th class='th'>Media ID</th><th class='th'>Performer ID</th><th class='th'>Festival ID</th><th class='th'>Concert Type</th><th class='th'>Concert Genre</th><th class='th'>Concert Start Time</th></tr></thead><tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['ConcertID']) . "</td><td class='td'>" . htmlspecialchars($row['VenueID']) . "</td><td class='td'>" . htmlspecialchars($row['MediaID']) . "</td><td class='td'>" . htmlspecialchars($row['PerformerID']) . "</td><td class='td'>" . htmlspecialchars($row['FestivalID']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertType']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertGenre']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertStartTime']) . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "No data found in CONCERT table";
                    }
                    break;

                case 'review':
                    $result = $conn->query("SELECT * FROM REVIEW");

                    if ($result->num_rows > 0) {
                        echo "<table class='table'>";
                        echo "<thead><tr class='color'><th class='th'>Review ID</th><th class='th'>UserID</th><th class='th'>Concert ID</th><th class='th'>Review Paragraph</th><th class='th'>Review Score</th></tr></thead><tbody>";
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr class='tr'><td class='td'>" . htmlspecialchars($row['ReviewID']) . "</td><td class='td'>" . htmlspecialchars($row['UserID']) . "</td><td class='td'>" . htmlspecialchars($row['ConcertID']) . "</td><td class='td'>" . htmlspecialchars($row['ReviewParagraph']) . "</td><td class='td'>" . htmlspecialchars($row['ReviewScore']) . "</td></tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "No data found in REVIEW table";
                    }
                    break;

                default:
                    echo "invalid";
            }
        }
        ?>
    </section>


    <footer>
        <p>&copy; Hands Up</p>
    </footer>
</body>
</html>
// tables.php
// Properly formats the tables and returns them to webpage

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
        // establishes connection to database
        include('config/establish_connection.php');

        // determines which actions is pressed by the user
        if(isset($_GET['action'])) {
            $action = $_GET['action'];

            switch($action) {
                case 'users':
                    // executes SQL query for all users
                    $result = $conn->query("SELECT * FROM USERS");

                    // displays result based on the return value of query
                    if ($result->num_rows > 0) {
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
                    // execute SQL query to return all venues
                    $result = $conn->query("SELECT * FROM VENUE");

                    // formats and displays values based on return
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
                    // execute SQL query to return all media
                    $result = $conn->query("SELECT * FROM MEDIA");

                    // formats and dsiplays values based on return
                    if ($result->num_rows > 0) {
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
                    // execute SQL query to return all performers
                    $result = $conn->query("SELECT * FROM PERFORMER");

                    // formats and displays values based on return
                    if ($result->num_rows > 0) {
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
                    // execute SQL query to return all headliners
                    $result = $conn->query("SELECT * FROM HEADLINER");

                    // formats and displays values based on return
                    if ($result->num_rows > 0) {
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
                // execute SQL query to return all headliners
                    $result = $conn->query("SELECT * FROM SUPPORTER");

                    // formats and returns table based on query return
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
                // execute SQL query to return all festivals
                    $result = $conn->query("SELECT * FROM FESTIVAL");

                    // formats and returns table based on query return
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
                // execute SQL query to return all concerts
                    $result = $conn->query("SELECT * FROM CONCERT");

                    // formats and returns table based on query return
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
                    // executes SQL query that returns all reviews
                    $result = $conn->query("SELECT * FROM REVIEW");

                    // formats and returns table to webpage based on query return
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HandsUp</title>
    <link rel="stylesheet" href="assets/index.css">
    <link rel="stylesheet" href="assets/root.css">
</head>
<body bgcolor="ffffff"> 

<!-- ============================================ -->
<!--                    Hero                      -->
<!-- ============================================ -->

<section id="hero">
    <div class="container">
        <h1 class="title">Hands Up</h1>
        <p class="text">
        </p>
        <a href="" class="button-solid">Start Now</a>
    </div>

    <!-- Background Image -->
    <picture class="background">
        <source media="(max-width: 600px)" srcset="assets/images/homepage.jpg">
        <source media="(min-width: 601px)" srcset="assets/images/homepage.jpg">
        <img loading="lazy" decoding="async" src="assets/images/homepage.jpg alt="rave" width="2250" height="1500" aria-hidden="true">
    </picture>
</section>
  <br>
  <hr>
  <ul>
  <li><b>Relations:</b><br><br>
  <ol>
  <li><a href="tables.php?action=users" target="_blank">Users</a> 
      </li><li><a href="tables.php?action=venue" target="_blank">Venues</a>
      </li><li><a href="tables.php?action=media" target="_blank">Media</a>
      </li><li><a href="tables.php?action=performer" target="_blank">Performers</a>
      </li><li><a href="tables.php?action=headliner" target="_blank">Headliners</a>
      </li><li><a href="tables.php?action=supporter" target="_blank">Supporters</a>
      </li><li><a href="tables.php?action=festival" target="_blank">Festivals</a>
      </li><li><a href="tables.php?action=concert" target="_blank">Concerts</a>
      </li><li><a href="tables.php?action=review" target="_blank">Reviews</a>
  </ol>
  <br><br>
  <hr>
  </li><li><b>Queries:</b><br><br>
  <!-- You can dynamically insert your queries here as needed -->
  <ol>
      <li><a href="queries.php?action=concert_reviews&concertID=D08F897678">Query1</a>: Display all reviews for a specific concert by its ID (e.g., D08F897678).</li>
      <li><a href="queries.php?action=no_reviews">Query2</a>: Find concerts with no reviews.</li>
      <li><a href="queries.php?action=total_concerts">Query3</a>: Calculate the total number of concerts for each venue.</li>
      <li><a href="queries.php?action=average_score&concertID=B16892A3C6">Query4</a>: Find the average score for a concert by its ID (e.g., B16892A3C6).</li>
      <!-- Example for a custom query you might have -->
      <li><a href="queries.php?action=custom_query">Query5</a>: <Description of your custom query></li>
  </ol>

  <br><br>
  <hr>
  </li><li><i><b>Ad-hoc Query:</b><br><br>
  <!-- Ad-hoc query form -->
  <form method="POST" action="queries.php">
        <table>
          <tbody><tr>
            <td align="right">
              <strong>Please enter your query here<br></strong>
            </td>
            <td>
              <select id="action" name="action">
              <option value="select">SELECT</option>
              <option value="insert into">INSERT INTO</option>
              <option value="update">UPDATE</option>
              <option value="delete from">DELETE FROM</option>
              </select>
              <input size="30" name="query" type="text">
            </td>
          </tr>
          <tr>
            <td align="right">
              <input value="Clear" type="reset">
            </td>
            <td>
              <input value="Submit" type="submit">
            </td>
          </tr>
        </tbody></table>
      </form>
  </li></ul>
  <p></p>
  <hr noshade="noshade" size="2">
  <p></p>

</body>
</html>

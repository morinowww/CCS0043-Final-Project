<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freedom Wall</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Gallery</a></li>
                <li><a href="aboutthegallery.php">About The Gallery</a></li>
                <li><a href="search_filter.php">Search and Filter</a></li>
                <li><a href="freedomwall.php">Freedom Wall</a></li>
                <li><a href="all_artist_profile.php">Artists</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2 class = "body_text">Freedom Wall</h2>
        <form method="post" action= 'submit_message.php'>
            <label class = "body_text" for="name">Name (optional):</label>
            <input type="text" id="name" name="name">
            <br><br>
            <label class = "body_text" for="message">Your thoughts:</label>
            <textarea id="message" name="message" required></textarea>
            <br><br>
            <input class = "body_text"type="submit" value="Submit">
        </form>

        <h3 class = 'body_text' >Messages</h3>
        <div class ="display_grid">
            <?php
            require 'config.php';
            $stmt = $pdo->query('SELECT * FROM messages');
                while($row = $stmt->fetch()) {
                echo "<div class = 'item_frame'>";
                    echo "<p class = 'body_text'><strong>". htmlspecialchars($row['name']). ":</strong> ". htmlspecialchars($row['message']). "</p>";
                    echo "<p class = 'bodt_text'><em class = 'body_text'>". $row['timestamp']. "</em></p>";
                echo "</div>";
                }

            ?>
        </div>
    </main>
</body>
</html>
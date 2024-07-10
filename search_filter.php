<?php
    session_start();
    require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search and Filter</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Gallery</a></li>
                <li><a href="#">About The Gallery</a></li>
                <li><a href="search_filter.php">Search and Filter</a></li>
                <li><a href="#">Freedom Wall</a></li>
                <li><a href="all_artist_profile.php">Artists</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class =  "body_text">Search and Filter</h1>
        <form method="POST" action="search_filter.php">
            <input type="text" name="searchTerm" placeholder="Artist name, art name or description" ?>">
            <button type="submit">Search</button>
        </form>
        <div class="display_grid">
            <?php
            if (isset($_POST['searchTerm'])){
                require 'config.php';
                $stmt = $pdo->query('SELECT * FROM arts');
                while ($row = $stmt->fetch()){
                    if ($row['artist_id'] == $_POST['searchTerm'] || 
                    $row['art_name'] == $_POST['searchTerm'] || $row['art_description'] == $_POST['searchTerm']){
                        echo "<div class = 'item_frame'>";
                            echo "<h2 class = 'body_text'>".$row['art_name']."</h2>";
                            echo "<h3 class = 'body_text'>".$row['artist_id']."</h2>";
                            echo "<div class = 'item_frame_image'>";
                                echo "<img img class = 'img_sub' src = ./Gallery/" . $row['art_id'] .  "." . $row['art_format'] . ">";
                            echo "</div>";
                            echo "<p class = 'art_date'>Created on:" . $row['art_date'] . "</p>";
                            echo "<p class = 'art_date'>Posted on:" . $row['art_posted'] . "</p>";
                            echo "<form action = 'detailed_view.php' method = 'POST'>";
                                echo "<input type='hidden' name='id_detailed' value = " . '"'. $row['art_id'] .'"'.">";
                                echo '<button type = "submit">Detailed View</button>';  
                            echo "</form>";                            
                        echo "</div>";
                    }
                }
            }
            ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
    session_start();
    unset($_SESSION['art_id_detailed']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Gallery</title>
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
                <li><a href="#">Search and Filter</a></li>
                <li><a href="#">Bulletin Board</a></li>
                <li><a href="#">Artists</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class = "body_text">Welcome to The Gallery</h1>
        <p  class = "body_text">Explore our vast collection of art and history.</p>
        <div class ="display_grid">
                <?php
                    require 'config.php';
                    $stmt = $pdo->query('SELECT * FROM arts');
                    while ($row = $stmt->fetch()){
                    //for ($x = 0; $x < 2; $x++){
                            echo "<div class = 'item_frame'>";
                                echo "<h2 class = 'body_text'>".$row['art_name']."</h2>";
                                echo "<h3 class = 'body_text'>".$row['artist_id']."</h2>";
                                echo "<div class = 'item_frame_image'>";
                                    echo "<img class = 'img_sub' src = ./Gallery/" . $row['art_id'] .  "." . $row['art_format'] . ">";
                                echo "</div>";
                                echo "<p class = 'art_date'>" . $row['art_date'] . "</p>";
                                echo "<form action = 'detailed_view.php' method = 'POST'>";
                                    echo "<input type='hidden' name='id_detailed' value = " . '"'. $row['art_id'] .'"'.">";
                                    echo '<button type = "submit">Detailed View</button>';  
                                echo "</form>";
                            echo "</div>";
                    }
                ?>
        </div>
    </main>
    <footer>
        <p class = "footer_text">&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
session_start();
require 'config.php';

if (!isset($_POST['artist_id'])) {
    header('Location: artist_profiles.php');
    exit();
}

$artist_id = $_POST['artist_id'];
$stmt = $pdo->prepare('SELECT * FROM artists WHERE artist_id = ?');
$stmt->execute([$artist_id]);
$artist = $stmt->fetch();

if (!$artist) {
    header('Location: allartist_profile.php');
    exit();
}

$art_stmt = $pdo->prepare('SELECT * FROM arts WHERE artist_id = ?');
$art_stmt->execute([$artist_id]);
$arts = $art_stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($artist['artist_name']); ?> - Profile</title>
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
                <li><a href="aboutthegaller.php">About The Gallery</a></li>
                <li><a href="search_filter.php">Search and Filter</a></li>
                <li><a href="freedomwall.php">Freedom Wall</a></li>
                <li><a href="all_artist_profile.php">Artists</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1 class = "body_text"><?php echo htmlspecialchars($artist['artist_name']); ?></h1>
        <h2 class = "body_text"><?php echo htmlspecialchars($artist['artist_id']); ?></h1>
        <p class = "body_text">Email: <?php echo htmlspecialchars($artist['artist_email']); ?></p>
        <h1 class = "body_text">Artworks</h2>
        <hr></hr>
        <div class="display_grid">
            <?php foreach ($arts as $art): ?>
                <div class="item_frame">
                    <h2 class="body_text"><?php echo htmlspecialchars($art['art_name']); ?></h2>
                    <div class="item_frame_image">
                        <img class="img_sub" src="Gallery/<?php echo htmlspecialchars($art['art_id']) . '.' . htmlspecialchars($art['art_format']); ?>" alt="<?php echo htmlspecialchars($art['art_name']); ?>">
                    </div>
                    <?php
                        echo "<p class = 'art_date'>Created on: " . $art['art_date'] . "</p>";
                        echo "<p class = 'art_date'>Posted on: " . $art['art_posted'] . "</p>";                            
                        echo "<form action = 'detailed_view.php' method = 'POST'>";
                        echo "<input type='hidden' name='id_detailed' value = " . '"'. $art['art_id'] .'"'.">";
                        echo '<button type = "submit">Detailed View</button>';  
                        echo "</form>";
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

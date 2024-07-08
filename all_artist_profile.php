<?php
    session_start();
    require 'config.php';
    $stmt = $pdo->query('SELECT * FROM artists');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artist Profiles</title>
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
        <h1 class = "body_text">Artist Profiles</h1>
        <div class="display_grid">
            <?php while ($row = $stmt->fetch()): ?>
                <div class="item_frame">
                    <h2 class="body_text"><?php echo htmlspecialchars($row['artist_name']); ?></h2>
                    <p class="body_text"><?php echo htmlspecialchars($row['artist_id']); ?></p>
                    <form action="artist_profile.php" method="POST">
                        <input type="hidden" name="artist_id" value="<?php echo htmlspecialchars($row['artist_id']); ?>">
                        <button type="submit">View Profile</button>
                    </form>
                </div>
            <?php endwhile; ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

<?php
    session_start();
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
                <li><a href="aboutthegallery.php">About The Gallery</a></li>
                <li><a href="search_filter.php">Search and Filter</a></li>
                <li><a href="freedomwall.php">Freedom Wall</a></li>
                <li><a href="all_artist_profile.php">Artists</a></li>
                <li><a href="account.php">Account</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div>
            <form action = "submit_art.php" method="POST" enctype="multipart/form-data">
                <div>
                    <input style = "width: 500px" type="text" name="art_name" placeholder="Art Name" required>
                    <label class = "body_text">Date Created</label>
                    <input type="date" name="art_date" placeholder="Date Created" required>
                </div>
                <div>
                    <textarea rows = "5"style = "width: 765px" name="art_description" pattern= "{,500}" title = "Description must not be longer than 500 words." placeholder = "Enter short description here (0-500 words)"></textarea>
                </div>
                <div><input type="file" id="myFile" name="art_fileUpload" class = "file_upload" required
                title = "Only JPG, PNG, and GIF format is accepted"  multiple accept = "image/*"></div>
                <div></div>
                <input type="submit">
            </form>
        <div>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

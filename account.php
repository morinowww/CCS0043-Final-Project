<?php
    session_start();


    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit();
    }
    if (isset($_POST['logout'])){
        header('Location: login.php');
        unset($_SESSION['user']);
    }


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
        <div class = "account_div">
            <div class = "account_div_account">
                <h1 class = "body_text"> <?php echo $_SESSION['_name']?></h1>
                <h3 class = "body_text"> <?php echo $_SESSION['user']?></h1>
                <h3 class = "body_text"> <?php echo $_SESSION['email']?></h1>
            </div>
            <div>
                <button type = "submit" name = "add_art" onclick="document.location='add_art.php'">Add Art</button>
                <form action="account.php" method="POST">
                    <button type="submit" name="logout">Logout</button>
                </form>
            </div>
        </div>

        <hr></hr>
        <h1 class = "body_text">Your Gallery</h1>
        <div class ="display_grid">
                <?php
                    require 'config.php';
                    $stmt = $pdo->query('SELECT * FROM arts');
                    while ($row = $stmt->fetch()){
                        if ($row['artist_id'] == $_SESSION['user']){
                            echo "<div class = 'item_frame'>";
                                echo "<h2 class = 'body_text'>".$row['art_name']."</h2>";
                                echo "<h3 class = 'body_text'>".$row['artist_id']."</h2>";
                                echo "<div class = 'item_frame_image'>";
                                    echo "<img src = ./Gallery/" . $row['art_id'] .  "." . $row['art_format'] . ">";
                                echo "</div>";
                                echo "<p class = 'art_date'>" . $row['art_date'] . "</p>";
                            echo "</div>";
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

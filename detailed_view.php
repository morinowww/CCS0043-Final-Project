<?php
    session_start();
    require 'config.php';
    $stmt = $pdo->query('SELECT * FROM arts');
    $stmt2 = $pdo->query('SELECT * FROM artists');
    $stmt3 = $pdo->query('SELECT * FROM art_comments');
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
        <div class = detailed_view_contain>
            <?php
                while ($row = $stmt->fetch()){
                    if ($row['art_id'] == $_POST['id_detailed']){
                        echo "<div class = 'item_frame_image_detailed'>";
                            echo "<img  class = 'img_detail' src = ./Gallery/" . $row['art_id'] .  "." . $row['art_format'] . ">";
                        echo "</div>";
                            echo "<h1 class = 'body_text' style 'padding: 0px 0px;'>". $row["art_name"] ."</h1>";
                            echo "<div class = 'frame_detailed'>";
                                while ($row2 = $stmt2->fetch()){
                                    if ($row2['artist_id'] == $row['artist_id']){  
                                        echo "<h2 class = 'body_text'>". $row2["artist_name"] ."</h2>";
                                    }
                                }      
                            echo "<em><h3 class = 'body_text'>". $row["artist_id"] ."</h3></em>";
                            echo "<h4 class = 'body_text'>". $row["art_date"] ."</h4>";
                            echo "<p class = 'body_text'>" . $row["art_description"] . "</p>";
                            echo '<button onclick =' . '"document.location = ' . "'index.php'" . '"' . '>Done</button>';                         
                        echo "</div>";
                    }
                }
            ?>
            <div>
                <div>
                    <?php echo "<hr style = 'width:100%'>"?>
                    <h2 class = "body_text">Comments</h2>
                        <form>
                            <textarea rows = "5"style = "width: 690px" name="art_description" pattern= "{,500}" title = "Comments must not be longer than 500 words." placeholder = "Enter comment here (0-500 words)"></textarea>
                            <button type = "submit">Submit</button>
                        </form>
                </div>
                <?php 
                    while ($row3 = $stmt3->fetch()){
                        if ($row3['art_id'] == $_POST['id_detailed']){
                            echo "<hr style = 'width:100%'>";
                            echo "<div class = 'comment_entry'>";
                                echo "<p class = 'body_text'>". $row3['art_comment'] ."</p>";
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

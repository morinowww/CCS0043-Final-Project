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
        <h1> <?php echo $_SESSION['_name']?></h1>
        <h1> <?php echo $_SESSION['user']?></h1>
        <h1> <?php echo $_SESSION['email']?></h1>
        <form action="account.php" method="POST">
            <div><button type="submit" name="add_art">Add Art</button></div>
            <div><button type="submit" name="logout">Logout</button></div>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>

</html>

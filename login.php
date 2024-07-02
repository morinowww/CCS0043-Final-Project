<?php
session_start();
require 'config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try{
        $stmt = $pdo->query('SELECT * FROM artists');
        while ($row = $stmt->fetch()) {
            if ($row['artist_id'] == $username && $row['artist_password'] == $password){
                $_SESSION['user'] = $username;
                $_SESSION['_name'] = $row['artist_name'];
                $_SESSION['email'] = $row['artist_email'];
                header('Location: index.php');        
            }
        }
        $loginError = "Invalid username or password.";
    }
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        <h1 class = "body_text" >Login</h1>
        <?php if (isset($loginError)): ?>
            <p style="color: red;"><?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>
        <form action="login.php" method="POST">
            <div>
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" name="login">Login</button>
        </form>
        <hr></hr>
        <button type="submit" name="register" onclick="document.location='register.php'">Create an account</button>

    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

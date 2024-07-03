<?php
    session_start();
    require 'config_artist.php';

    $valid = TRUE;

    if (isset($_POST['submit'])) {
        $username = $_POST['artistUsername'];
        try{
            $stmt = $pdo->query('SELECT * FROM artists');
            while ($row = $stmt->fetch()) {
                if ($row['artist_id'] == $username){
                    $loginError = "Username already taken.";
                    $valid = FALSE;
                }
            }
        }
        catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        if ($valid){
            $_SESSION['user'] = $_POST['artistUsername'];
            $_SESSION['name'] = $_POST['artistName'];
            $_SESSION['pass'] = $_POST['artistPass'];
            $_SESSION['email'] = $_POST['artistEmail'];
            header("Location: submit_account.php");
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
        <h1 class = "body_text" >Register</h1>
        <?php if (isset($loginError)): ?>
            <p style="color: red;"><?= htmlspecialchars($loginError) ?></p>
        <?php endif; ?>
        <form action="register.php" method="POST">
            <div>
                <input type="text" name="artistName" placeholder= "Artist Name" required>
                <input type="email" name="artistEmail" placeholder="Email" required
                    title = "Please input valid email">
            </div>
            <div>
                <input type="text" name="artistUsername" placeholder= "Username" required
                    pattern="^\S+$" 
                    title = "Username must contain no spaces"
                    required>
                <input type="password" name="artistPass" placeholder="Password" 
                    pattern= "(?=.*[a-z])(?=.*[A-Z]).{8,50}" 
                    title = "Password must contain at least one number and one uppercase and lowercase letter, and must be at least 8 characters"
                    required>
            </div>
            <button type="submit" name="submit">Submit</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2024 Mortel Artworks Gallery. All rights reserved.</p>
    </footer>
</body>
</html>

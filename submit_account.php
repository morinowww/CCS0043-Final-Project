<?php
    session_start();
    
    $artist_name = ($_SESSION['name']); 
    $artist_email = ($_SESSION['email']);
    $artist_user = ($_SESSION['user']);
    $artist_password = ($_SESSION['pass']);

    require 'config.php';

    $sql = "INSERT INTO artists(artist_name, artist_id, artist_email, artist_password)
    VALUES ('$artist_name', '$artist_user', '$artist_email', '$artist_password')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    $_SESSION['user'] = $artist_user;
    header("Location: " . "account.php");
    exit()
?>
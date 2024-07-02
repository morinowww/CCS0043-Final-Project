<?php
    session_start();
    
    $a_name = ($_SESSION['name']); 
    $a_email = ($_SESSION['email']);
    $a_user = ($_SESSION['username']);
    $a_password = ($_SESSION['pass']);

    require 'config.php';

    $sql = "INSERT INTO artists(artist_name, artist_id, artist_email, artist_password)
    VALUES ('$a_name', '$a_user', '$a_email', '$a_password')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    $_SESSION['user'] = $a_user;
    header("Location: " . "account.php");
    exit()
?>
<?php
    session_start();

    $art_id = ($_POST['id_detailed']); 
    $_SESSION['art_id_detailed'] = $art_id; 
    $art_comment = ($_POST["art_comment"]);
    require 'config.php';
    if (!empty(trim($_POST['art_comment']))){
        $sql = "INSERT INTO art_comments(art_id, art_comment)
        VALUES ('$art_id', '$art_comment')";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
    }
    header("Location: " . "detailed_view.php");
    exit()
?>
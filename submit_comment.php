<?php
    session_start();
    require 'config.php';


    $result = mysqli_query($con, "SELECT MAX(art_comment_id) AS max_art_comment_id FROM art_comments");    
    $lastrowid = mysqli_fetch_array($result);
    $art_comment_id = sprintf('%011d', ((int)$lastrowid["max_art_comment_id"] + 1));


    $art_id = ($_POST['id_detailed']); 
    $_SESSION['art_id_detailed'] = $art_id; 
    $date = date('Y-m-d H:i:s');
    $art_comment = ($_POST["art_comment"]);
    if (!empty(trim($_POST['art_comment']))){
        $sql = "INSERT INTO art_comments(art_comment_id, art_id, art_comment, art_comment_date)
        VALUES ('$art_comment_id','$art_id', '$art_comment', '$date')";
        $result = mysqli_query($con, $sql);
        mysqli_close($con);
    }
    header("Location: " . "detailed_view.php");
    exit()
?>
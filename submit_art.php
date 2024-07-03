<?php
    session_start();
    
    $art_id = 1;
    $art_name = ($_POST['art_name']); 
    $art_description = ($_POST['art_description']);
    $art_date = ($_POST['art_date']);
    $artist_id = ($_SESSION['user']);
    $art_uploaded = $_FILES['art_fileUpload'];

    require 'config.php';

    /*
    $sql = "INSERT INTO arts(art_id, art_name, art_date, artist_id, art_description)
    VALUES ('$art_id', '$art_name', '$art_date', '$artist_id', '$art_description')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);
    */

    $ext = pathinfo($art_uploaded['name'], PATHINFO_EXTENSION);

    echo $ext;

    $art_uploaded['name'] = $art_id . "." . $ext;
    move_uploaded_file($art_uploaded['tmp_name'], "gallery/".$art_uploaded['name']);

    exit()
?>
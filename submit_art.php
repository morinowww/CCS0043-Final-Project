<?php
    session_start();
    
    $art_id = 2;
    $art_name = ($_POST['art_name']); 
    $art_description = ($_POST['art_description']);
    $art_date = ($_POST['art_date']);
    $artist_id = ($_SESSION['user']);
    $art_upload = ($_POST['art_fileUpload']);

    require 'config.php';

    print_r($_POST);

    $sql = "INSERT INTO arts(art_id, art_name, art_date, artist_id, art_description, art_image)
    VALUES ('$art_id', '$art_name', '$art_date', '$artist_id', '$art_description', '$art_upload')";
    $result = mysqli_query($con, $sql);
    mysqli_close($con);

    exit()
?>
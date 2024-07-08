<?php
    session_start();
    
    $art_name = ($_POST['art_name']); 
    $art_description = ($_POST['art_description']);
    $art_date = ($_POST['art_date']);
    $artist_id = ($_SESSION['user']);
    $art_uploaded = $_FILES['art_fileUpload'];

    if (empty($art_name) || empty($art_date) || empty($_FILES['art_fileUpload'])){
        header("Location: " . "add_art.php");
        exit();
    }
    require 'config.php';

    $result = mysqli_query($con, "SELECT MAX(art_id) AS max_art_id FROM arts");    
    $lastrowid = mysqli_fetch_array($result);
    $art_id = sprintf('%011d', ((int)$lastrowid["max_art_id"] + 1));

    //echo $art_id;    

    $art_ext = pathinfo($art_uploaded['name'], PATHINFO_EXTENSION);

    $art_uploaded['name'] = $art_id . "." . $art_ext;
    move_uploaded_file($art_uploaded['tmp_name'], "gallery/".$art_uploaded['name']);

    if (!$art_ext == ('jpg' || 'jpeg' || 'png' || 'gif')){
        exit();
    }

    $sql = "INSERT INTO arts(art_name, art_date, artist_id, art_description, art_id, art_format)
    VALUES ('$art_name', '$art_date', '$artist_id', '$art_description', '$art_id', '$art_ext')";
    $result = mysqli_query($con, $sql);


    echo $ext;

    mysqli_close($con);

    header("Location: " . "thank_you.php");

    exit()
?>
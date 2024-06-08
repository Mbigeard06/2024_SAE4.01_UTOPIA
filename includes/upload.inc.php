<?php

$file = $_FILES['dp'];

if (!empty($_FILES['dp']['name'])) {
    $fileName = $_FILES['dp']['name'];
    $fileTmpName = $_FILES['dp']['tmp_name'];
    $fileSize = $_FILES['dp']['size'];
    $fileError = $_FILES['dp']['error'];
    $fileType = $_FILES['dp']['type']; 
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    if (in_array($fileActualExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // vérification de la taille (5MB = 5*1024*1024 bytes)
                list($width, $height) = getimagesize($fileTmpName);
                if ($width <= 320 && $height <= 320) { // vérification des dimensions max (320x320)
                    $FileNameNew = uniqid('', true) . "." . $fileActualExt;
                    $fileDestination = '../uploads/' . $FileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                } else {
                    header("Location: ../signup.php?error=imgdimensionexceeded");
                    exit(); 
                }
            } else {
                header("Location: ../signup.php?error=imgsizeexceeded");
                exit(); 
            }
        } else {
            header("Location: ../signup.php?error=imguploaderror");
            exit();
        }
    } else {
        header("Location: ../signup.php?error=invalidimagetype");
        exit();
    }
}
?>


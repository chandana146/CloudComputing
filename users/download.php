<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // fetch file to download from database
    $sql = "SELECT * FROM file WHERE id=$id";
    $result = mysqli_query($db, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'upload/' . $file['file_name'];

    if (file_exists($filepath)) {
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('upload/' . $file['file_name']));
        readfile('upload/' . $file['file_name']);
        exit;
    }
}
?>
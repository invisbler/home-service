<?php

function clean($data = array())
{
    foreach ($data as $key => $val) {
        $data[$key] = trim($val);
        $data[$key] = stripslashes($val);
        $data[$key] = htmlspecialchars($val);
    }
    return $data;
}

function upload($file, $allowed = ['png', 'jpg', 'jpeg', 'gif'])
{
    // Check if file was uploaded
    if (!isset($file['error']) || $file['error'] !== UPLOAD_ERR_OK) {
        return false;
    }

    $a = explode('.', $file['name']);
    $ext = strtolower(end($a)); // Make sure to use lowercase for extensions

    if (!in_array($ext, $allowed)) {
        return false;
    }

    // Define the upload directory
    $uploadDir = '../storage/';

    // Ensure the directory exists and is writable
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true); // Create directory if it does not exist
    }

    if (!is_writable($uploadDir)) {
        return false;
    }

    $dest = uniqid() . '.' . $ext;
    $destPath = $uploadDir . $dest;

    if (move_uploaded_file($file['tmp_name'], $destPath)) {
        return $dest;
    }
    return false;
}

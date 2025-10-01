<?php
include('config.php');

$id = intval($_GET['id']);

// Get product info
$sql = "SELECT posts_imgs FROM products WHERE id=$id";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $posts = $row['posts_imgs'];
    $namesArray = array_filter(array_map('trim', explode(',', $posts)));

    $zip = new ZipArchive();
    $zipName = "posts_images_$id.zip";
    $zipPath = sys_get_temp_dir() . '/' . $zipName;

    if ($zip->open($zipPath, ZipArchive::CREATE) === TRUE) {
        foreach ($namesArray as $img) {
            $filePath = __DIR__ . "/posts/$img";
            if (file_exists($filePath)) {
                $zip->addFile($filePath, $img);
            }
        }
        $zip->close();

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $zipName . '"');
        header('Content-Length: ' . filesize($zipPath));
        readfile($zipPath);

        // Clean up
        unlink($zipPath);
        exit;
    } else {
        echo "Failed to create zip file.";
    }
} else {
    echo "No posts found.";
}
?>
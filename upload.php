<?php
$uploadDir = "uploads/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $desc = htmlspecialchars($_POST['description']);
    $file = $_FILES['file'];

    $filename = basename($file["name"]);
    $targetFile = $uploadDir . time() . "_" . $filename;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "pdf", "doc", "docx"];

    if (!in_array($fileType, $allowed)) {
        die("File type not allowed.");
    }

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        echo "<h2>Upload Successful!</h2>";
        echo "<p><strong>Title:</strong> $title</p>";
        echo "<p><strong>Description:</strong> $desc</p>";
        echo "<p><a href='$targetFile' target='_blank'>View Uploaded File</a></p>";
    } else {
        echo "Upload failed.";
    }
} else {
    echo "Invalid request.";
}
?>

<?php
$targetDir = "uploads/";
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file = $_FILES["file"];
    $fileName = time() . "_" . basename($file["name"]);
    $targetFile = $targetDir . $fileName;

    $allowed = ["jpg", "jpeg", "png", "pdf", "doc", "docx"];
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    if (!in_array($ext, $allowed)) {
        echo "Invalid file type.";
        exit;
    }

    if (move_uploaded_file($file["tmp_name"], $targetFile)) {
        echo "File uploaded successfully: <a href='$targetFile'>View File</a>";
    } else {
        echo "Error uploading file.";
    }
}
?>

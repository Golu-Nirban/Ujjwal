<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Gallery - Ujjwal School</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 20px;
    }
    .container {
      max-width: 900px;
      margin: auto;
      background: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
    }
    .grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 20px;
    }
    .item {
      background: #fafafa;
      padding: 10px;
      border-radius: 8px;
      text-align: center;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }
    .item img {
      max-width: 100%;
      height: auto;
      border-radius: 5px;
    }
    .item a {
      text-decoration: none;
      color: #007bff;
      display: block;
      margin-top: 8px;
      word-wrap: break-word;
    }
    .item a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📁 Ujjwal School Gallery</h2>
    <div class="grid">
      <?php
      $uploadDir = "uploads/";
      $files = array_diff(scandir($uploadDir), array('.', '..'));
      if (empty($files)) {
        echo "<p>No files uploaded yet.</p>";
      } else {
        foreach ($files as $file) {
          $path = $uploadDir . $file;
          $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
          echo '<div class="item">';
          if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            echo "<img src='$path' alt='$file'>";
          } elseif (in_array($ext, ['pdf', 'doc', 'docx'])) {
            echo "📄";
          } else {
            echo "📎";
          }
          echo "<a href='$path' target='_blank'>$file</a>";
          echo '</div>';
        }
      }
      ?>
    </div>
  </div>
</body>
</html>

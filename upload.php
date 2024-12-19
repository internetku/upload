<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload File</title>
</head>
<body>
    <h1>Upload File</h1>
    
    <?php
    // Menampilkan pesan setelah upload
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $uploadDir = 'uploads/'; // Direktori untuk menyimpan file
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Membuat direktori jika belum ada
        }

        $uploadFile = $uploadDir . basename($_FILES['uploadedFile']['name']);
        
        if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadFile)) {
            echo "<p>File berhasil diupload: <a href=\"$uploadFile\">" . htmlspecialchars(basename($_FILES['uploadedFile']['name'])) . "</a></p>";
        } else {
            echo "<p>Terjadi kesalahan saat mengupload file.</p>";
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="uploadedFile">Pilih file untuk diupload:</label><br>
        <input type="file" name="uploadedFile" id="uploadedFile" required><br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>

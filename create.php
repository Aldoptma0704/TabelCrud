<?php include 'koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Madrid Tim</title>
    <link rel="stylesheet" href="create.css">
</head>
<body>
    <h1>Tambah Pemain<br></h1>
    <form method="post" Action="create.php">
        <label>Name:</label>
        <input type="text" name="nama" required>
        <br>
        <label>No punggung</label>
        <input type="text" name="no_punggung" required>
        <br>
        <label>Posisi</label>
        <input type="text" name="posisi" required>
        <br>
        <button type="submit">Tambah Pemain</button>
    </form>

    <a href="index.php">Kembali ke daftar pemain</a>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nama = $_POST['nama'];
        $no_punggung = $_POST['no_punggung'];
        $posisi = $_POST['posisi'];

        $stmt = $conn->prepare("INSERT INTO users (nama, no_punggung, posisi) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $nama, $no_punggung, $posisi);
        if ($stmt->execute()) {
            echo "Pemain baru berhasil ditambahkan.";
        }else{
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
    ?>
</body>
</html>
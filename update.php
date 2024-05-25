<?php include 'koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pemain</title>
    <link rel="stylesheet" href="update.css">
</head>
<body>
    <h1>Edit Pemain</h1>
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM users WHERE id = $id");
        $user = $result->fetch_assoc();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $no_punggung = $_POST['no_punggung'];
        $posisi = $_POST['posisi'];

        $stmt = $conn->prepare("UPDATE users SET nama = ?, no_punggung = ?, posisi = ? WHERE id = ?");
        $stmt->bind_param("sssi", $nama, $no_punggung, $posisi, $id);
        if ($stmt->execute()) {
            echo "Pemain berhasil di Update.";
        }else {
            echo "Error: ". $stmt->error;
        }
        $stmt->close();
        header("Location: index.php");
        exit;
    }
    ?>
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <label>nama:</label>
        <input type="text" name="nama" value="<?php echo $user['nama']; ?>" required>
        <br>
        <label>no punggung:</label>
        <input type="text" name="no_punggung" value="<?php echo $user['no_punggung']; ?>" required>
        <br>
        <label>posisi:</label>
        <input type="text" name="posisi" value="<?php echo $user['posisi']; ?>">
        <br>
        <button type="submit">Update Pemain</button>
    </form>
    <a href="index.php">Kembali ke daftar pemain</a>
</body>
</html>

<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "Pemain berhasil dihapus";
    }else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
header("Location: index.php");
exit;
?>
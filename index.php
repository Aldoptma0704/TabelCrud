<?php include 'koneksi.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Madrid Tim</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <h1>Daftar Pemain Real Madrid<br></h1>
    <a href="create.php">Tambah daftar pemain</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No Punggung</th>
            <th>Posisi</th>
            <th>Action</th>
        </tr>
        <?php
        $result = $conn->query("SELECT * FROM users");
        while($row = $result->fetch_assoc()){
            echo "<tr>
            <td>".$row['id']."</td>
            <td>".$row['nama']."</td>
            <td>".$row['no_punggung']."</td>
            <td>".$row['posisi']."</td>
            <td>
            <a href='update.php?id=".$row['id']."'>Edit</a>
            <a href='delete.php?id=".$row['id']."'>Delete</a>
        </td>
        </tr>";
        }
        ?>
</body>
</html>
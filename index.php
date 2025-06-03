<?php
include 'koneksi.php';
$result = $conn->query("SELECT * FROM buku");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Daftar Buku</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
<?php include 'navbar.php'; ?>
<h2>Daftar Buku</h2>
<table class="table table-bordered">
    <tr><th>Judul</th><th>Penulis</th><th>Tahun</th><th>Genre</th><th>Aksi</th></tr>
    <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?= $row['judul'] ?></td>
            <td><?= $row['penulis'] ?></td>
            <td><?= $row['tahun_terbit'] ?></td>
            <td><?= $row['genre'] ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
    <?php } ?>
</table>
</body>
</html>
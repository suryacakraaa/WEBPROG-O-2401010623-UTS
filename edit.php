<?php
include 'koneksi.php';
$id = $_GET['id'];
$buku = $conn->query("SELECT * FROM buku WHERE id = $id")->fetch_assoc();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $desc = $_POST['deskripsi'];
    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', tahun_terbit='$tahun', genre='$genre', deskripsi='$desc' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Gagal mengedit buku.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Edit Buku</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="container mt-4">
<?php include 'navbar.php'; ?>
<h2>Edit Buku</h2>
<form method="post">
    <div class="mb-2"><label>Judul</label><input type="text" name="judul" class="form-control" value="<?= $buku['judul'] ?>" required></div>
    <div class="mb-2"><label>Penulis</label><input type="text" name="penulis" class="form-control" value="<?= $buku['penulis'] ?>" required></div>
    <div class="mb-2"><label>Tahun Terbit</label><input type="number" name="tahun_terbit" class="form-control" value="<?= $buku['tahun_terbit'] ?>" required></div>
    <div class="mb-2"><label>Genre</label>
        <select name="genre" class="form-control" required>
            <option value="Fiksi" <?= $buku['genre'] == 'Fiksi' ? 'selected' : '' ?>>Fiksi</option>
            <option value="Non-Fiksi" <?= $buku['genre'] == 'Non-Fiksi' ? 'selected' : '' ?>>Non-Fiksi</option>
            <option value="Biografi" <?= $buku['genre'] == 'Biografi' ? 'selected' : '' ?>>Biografi</option>
            <option value="Teknologi" <?= $buku['genre'] == 'Teknologi' ? 'selected' : '' ?>>Teknologi</option>
            <option value="Sejarah" <?= $buku['genre'] == 'Sejarah' ? 'selected' : '' ?>>Sejarah</option>
        </select>
    </div>
    <div class="mb-2"><label>Deskripsi</label><textarea name="deskripsi" class="form-control"><?= $buku['deskripsi'] ?></textarea></div>
    <button type="submit" class="btn btn-success">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</body>
</html>
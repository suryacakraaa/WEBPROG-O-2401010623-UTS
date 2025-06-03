<?php
include 'koneksi.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];
    $desc = $_POST['deskripsi'];
    $sql = "INSERT INTO buku (judul, penulis, tahun_terbit, genre, deskripsi) VALUES ('$judul', '$penulis', '$tahun', '$genre', '$desc')";
    if ($conn->query($sql)) {
        header("Location: index.php");
    } else {
        echo "Gagal menambahkan buku.";
    }
}
?>
<!DOCTYPE html>
<html>
<head><title>Tambah Buku</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"></head>
<body class="container mt-4">
<?php include 'navbar.php'; ?>
<h2>Tambah Buku</h2>
<form method="post">
    <div class="mb-2"><label>Judul</label><input type="text" name="judul" class="form-control" required></div>
    <div class="mb-2"><label>Penulis</label><input type="text" name="penulis" class="form-control" required></div>
    <div class="mb-2"><label>Tahun Terbit</label><input type="number" name="tahun_terbit" class="form-control" required></div>
    <div class="mb-2"><label>Genre</label>
        <select name="genre" class="form-control" required>
            <option value="">Pilih Genre</option>
            <option value="Fiksi">Fiksi</option>
            <option value="Non-Fiksi">Non-Fiksi</option>
            <option value="Biografi">Biografi</option>
            <option value="Teknologi">Teknologi</option>
            <option value="Sejarah">Sejarah</option>
        </select>
    </div>
    <div class="mb-2"><label>Deskripsi</label><textarea name="deskripsi" class="form-control"></textarea></div>
    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>
</body>
</html>
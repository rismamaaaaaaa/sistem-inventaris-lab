
<?php
include "../koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_lokasi = $_POST['nama_lokasi'];
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = "../uploads/lokasi/";

    if (move_uploaded_file($tmp, $folder . $gambar)) {
        $query = mysqli_query($koneksi, "INSERT INTO lokasi (nama_lokasi, gambar) VALUES ('$nama_lokasi', '$gambar')");

        if ($query) {
            header("Location: index.php");
            exit;
        } else {
            echo "Data gagal disimpan!";
        }
    } else {
        echo "Upload gambar gagal!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lokasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Tambah Lokasi</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama Lokasi:</label><br>
        <input type="text" name="nama_lokasi" required>
        <br><br>

        <label>Gambar:</label><br>
        <input type="file" name="gambar" accept="image/*" required>
        <br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>

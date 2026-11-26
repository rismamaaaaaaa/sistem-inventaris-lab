<?php
include "../koneksi.php";

$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM lokasi WHERE id = '$id'");
$data = mysqli_fetch_assoc($ambil);

if (isset ($_POST['update'])) {
    $nama_lokasi = $_POST['nama_lokasi'];
    $gambar = $data['gambar'];
    $upload_berhasil = true;

    if ($_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = basename($_FILES['gambar']['name']);
        $upload_berhasil = move_uploaded_file($_FILES['gambar']['tmp_name'], "../uploads/lokasi/" . $gambar);
    } elseif ($_FILES['gambar']['error'] !== UPLOAD_ERR_NO_FILE) {
        $upload_berhasil = false;
    }

    if ($upload_berhasil) {
        $sql = "UPDATE lokasi SET
                nama_lokasi = '$nama_lokasi',
                gambar = '$gambar'
                WHERE id = '$id'";
        $ubah = mysqli_query($koneksi, $sql);

        if ($ubah) {
            header("Location: index.php?pesan=Data berhasil diubah");
            exit;
        } else {
            echo "Gagal mengubah data: ". mysqli_error($koneksi);
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
    <title>Edit Lokasi</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h2>Edit Lokasi</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama Lokasi:</label><br>
        <input type="text" name="nama_lokasi" value="<?php echo $data['nama_lokasi']; ?>" required><br><br>

        <label>Gambar:</label><br>
        <img src="../uploads/lokasi/<?php echo htmlspecialchars($data['gambar']); ?>" alt="Gambar lokasi saat ini" width="100"><br>
        <input type="file" name="gambar" accept="image/*"><br><br>

        <button type="submit" name="update">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
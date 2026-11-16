<?php
include "koneksi.php";

$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM barang WHERE id = '$id'");
$data = mysqli_fetch_assoc($ambil);

if (isset($_POST['update'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $spesifikasi = $_POST['spesifikasi'];
    $kondisi = $_POST['kondisi'];
    $lokasi_ruang = $_POST['lokasi_ruang'];

    $sql = "UPDATE barang SET
            kode_barang = '$kode_barang',
            nama_barang = '$nama_barang',
            jumlah = '$jumlah',
            spesifikasi = '$spesifikasi',
            kondisi = '$kondisi',
            lokasi_ruang = '$lokasi_ruang'
            WHERE id = '$id'";
    $ubah = mysqli_query($koneksi, $sql);

    if ($ubah) {
        header("Location: index.php?pesan=data berhasil diubah");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>

<h2>Edit Barang</h2>
<form action="" method="post">

<label>Kode Barang:</label><br>
<input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required><br><br>

<label>Nama Barang:</label><br>
<input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required><br><br>

<label>Jumlah:</label><br>
<input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" required><br><br>

<label>Spesifikasi:</label><br>
<textarea name="spesifikasi" required><?php echo $data['spesifikasi']; ?></textarea><br><br>

<label>Kondisi:</label><br>
<input type="radio" name="kondisi" value="Baik" <?php if ($data['kondisi'] == 'Baik') echo 'checked'; ?> required> Baik
<input type="radio" name="kondisi" value="Rusak" <?php if ($data['kondisi'] == 'Rusak') echo 'checked'; ?>> Rusak<br><br>

<label>Lokasi Ruang:</label><br>
<select name="lokasi_ruang" required>
    <option value="">-- Pilih Lokasi Ruang --</option>
    <option value="Lab RPL 1" <?php if ($data['lokasi_ruang'] == 'Lab RPL 1') echo 'selected'; ?>>Lab RPL 1</option>
    <option value="Lab RPL 2" <?php if ($data['lokasi_ruang'] == 'Lab RPL 2') echo 'selected'; ?>>Lab RPL 2</option>
    <option value="Ruang Guru" <?php if ($data['lokasi_ruang'] == 'Ruang Guru') echo 'selected'; ?>>Ruang Guru</option>
    <option value="Perpustakaan" <?php if ($data['lokasi_ruang'] == 'Perpustakaan') echo 'selected'; ?>>Perpustakaan</option>
    <option value="Gudang" <?php if ($data['lokasi_ruang'] == 'Gudang') echo 'selected'; ?>>Gudang</option>
</select><br><br>

<button type="submit" name="update">Simpan</button>
<a href="index.php">Batal</a>
</form>
</body>
</html>
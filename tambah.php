<?php
include "koneksi.php";
$daftar_lokasi = mysqli_query($koneksi, "SELECT nama_lokasi FROM lokasi ORDER BY nama_lokasi");

if (isset ($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah = $_POST['jumlah'];
    $spesifikasi = $_POST['spesifikasi'];
    $kondisi = $_POST['kondisi'];
    $lokasi_ruang = $_POST['lokasi_ruang'];

    $sql = "INSERT INTO barang (kode_barang, nama_barang, jumlah, spesifikasi, kondisi, lokasi_ruang)
            VALUES ('$kode_barang', '$nama_barang', '$jumlah', '$spesifikasi', '$kondisi', '$lokasi_ruang')";
    $simpan = mysqli_query($koneksi, $sql);

    if ($simpan) {
        header("Location: index.php?pesan=Data berhasil ditambahkan");
        exit;
    } else {
        echo "Gagal menyimpan data: ". mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
</head>
<body>
    <h2>Tambah Barang</h2>
    <form action="" method="post">
        <label>Kode Barang:</label><br>
        <input type="text" name="kode_barang" required><br><br>

        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" required><br><br>

        <label>Jumlah:</label><br>
        <input type="number" name="jumlah" required><br><br>

        <label>Spesifikasi:</label><br>
        <textarea name="spesifikasi" required></textarea><br><br>

        <label>Kondisi:</label><br>
        <label><input type="radio" name="kondisi" value="Baik" required> Baik</label>
        <label><input type="radio" name="kondisi" value="Rusak"> Rusak</label><br><br>

        <label>Lokasi Ruang:</label><br>
        <select name="lokasi_ruang" required>
            <option value="">-- Pilih Lokasi Ruang --</option>
            <?php while ($lokasi = mysqli_fetch_assoc($daftar_lokasi)) { ?>
                <option value="<?php echo htmlspecialchars($lokasi['nama_lokasi']); ?>"><?php echo htmlspecialchars($lokasi['nama_lokasi']); ?></option>
            <?php } ?>
        </select><br><br>

        <button type="submit" name="simpan">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
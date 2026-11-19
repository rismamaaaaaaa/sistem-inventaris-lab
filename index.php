<?php
include "koneksi.php";

// fitur search
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = mysqli_query($koneksi, "SELECT barang.*, lokasi.gambar
        FROM barang
        LEFT JOIN lokasi ON barang.lokasi_ruang = lokasi.nama_lokasi
        WHERE barang.nama_barang LIKE '%$cari%'
        ");
} else {
    $query = mysqli_query($koneksi, "SELECT barang.*, lokasi.gambar
        FROM barang
        LEFT JOIN lokasi ON barang.lokasi_ruang = lokasi.nama_lokasi");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Inventaris Lab & Sarpras SMK</title>
</head>
<body>
    <h2>Sistem Inventaris Lab & Sarpras SMK</h2>

    <form action="" method="get">
        <input type="text" name="cari" placeholder="Cari barang">
        <button type="submit">Cari</button>
        <a href="index.php">Reset</a>
    </form>
    <br><br>

    <a href="tambah.php">+ Tambah Barang</a> |
    <a href="lokasi/index.php">Manajemen Lokasi Ruang</a>
    <br><br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status: <?php echo $_GET['pesan'] ?></b></p>
    <?php } ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Spesifikasi</th>
            <th>Kondisi</th>
            <th>Lokasi Ruang</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['kode_barang']; ?></td>
            <td><?php echo $data['nama_barang']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo $data['spesifikasi']; ?></td>
            <td><?php echo $data['kondisi']; ?></td>
            <td><?php echo $data['lokasi_ruang']; ?></td>
            <td>
                <?php if ($data['gambar']) { ?>
                    <img src="uploads/lokasi/<?php echo $data['gambar']; ?>" alt="" width="100">
                <?php } else { ?>
                    Tidak ada gambar
                <?php } ?>
            </td>
            <td>
                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
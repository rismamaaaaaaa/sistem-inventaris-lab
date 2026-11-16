<?php
include "koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM barang");
// fitur search
if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $query = mysqli_query($koneksi, "SELECT * FROM barang
        WHERE nama_barang LIKE '%$cari%'
        ");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM barang");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem inventaris lab & sarpras SMK</title>
</head>
<body>
    <h2>sistem inventaris lab & sarpras SMK</h2>
    <from action="" method="get">
        <input type="text" name="cari" placeholder="cari barang">
        <button type="submit">cari</button>
    </from>
    <br>
    
    <a href="tambah.php">+ tambah barang</a>
    <br><br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status: <?php echo $_GET['pesan'] ?><b></p>
    <?php } ?>

    <table border="1" cellpadding="5" cellpadding="0">
        <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Spesifikasi</th>
            <th>Kondisi</th>
            <th>Lokasi Ruang</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while($data = mysqli_fetch_assoc($query)) {
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
                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('yakin hapus data ini')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
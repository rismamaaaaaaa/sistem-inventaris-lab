<?php
include "../koneksi.php";
$query = mysqli_query($koneksi, "SELECT * FROM lokasi");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Lokasi</title>
</head>
<body>
    <h2>Data Lokasi</h2>
    <a href="tambah.php">+ Tambah Lokasi</a> |
    <a href="../index.php">Kembali ke Dashboard</a>
    <br><br>

    <?php if (isset($_GET['pesan'])) { ?>
        <p><b>Status: <?php echo $_GET['pesan'] ?></b></p>
    <?php } ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama Lokasi</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        while ($data = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $data['nama_lokasi']; ?></td>
            <td><img src="../uploads/lokasi/<?php echo $data['gambar']; ?>" alt="" width="100"></td>
            <td>
                <a href="edit.php?id=<?php echo $data['id']; ?>">Edit</a> |
                <a href="hapus.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Yakin hapus data ini?')">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
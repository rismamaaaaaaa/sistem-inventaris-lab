<?php
$koneksi = mysqli_connect("localhost", "root", "", "inventaris");

if (!$koneksi) {
    die("koneksi databas gagal: " . mysqli_connect_error());
}
?>
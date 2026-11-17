CREATE DATABASE IF NOT EXISTS inventaris;

USE inventaris;

CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_nama VARCHAR(20),
    nama_barang VARCHAR(100),
    jumlah INT,
    spesifikasi TEXT,
    kondisi ENUM('Baik, Rusak'),
    lokasi_ruang VARCHAR(30)
    );

    INSERT INTO barang (kode_barang, nama_barang, jumlah, spesifikasi, kondisi, lokasi_ruang) 
    VALUES
    ('0045 LAB1', 'laptop ASUS', 10, 'RAM BGB,SSD 256GB', 'Baik', 'lab RPL 1'),
    ('0046 LAB1', 'keyboard logitech', 15, 'keyboard USE', 'Rusak', 'lab RPL 2'),
    ('0048 LAB1', 'Monitor LG', 5, 'Monitor LED 24 inch', 'Baik', 'lab RPL 1'),
    ('0049-LAB1', 'Printer Epson', 3, 'Printer Ink Tank', 'Rusak', 'Ruang Guru');
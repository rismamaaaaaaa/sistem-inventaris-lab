CREATE DATABASE IF NOT EXISTS inventaris;

USE inventaris;

CREATE TABLE IF NOT EXISTS barang (
    id INT AUTO_INCREMENT PRIMARY KEY,
    kode_barang VARCHAR(20),
    nama_barang VARCHAR(100),
    jumlah INT,
    spesifikasi TEXT,
    kondisi ENUM('Baik', 'Rusak'),
    lokasi_ruang VARCHAR(30)
);

CREATE TABLE IF NOT EXISTS lokasi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_lokasi VARCHAR(100) NOT NULL,
    gambar VARCHAR(255) NOT NULL
);

INSERT INTO barang (kode_barang, nama_barang, jumlah, spesifikasi, kondisi, lokasi_ruang)
VALUES
('0045', 'Laptop ASUS', 10, 'RAM 8GB, SSD 256GB', 'Baik', 'Lab RPL 1'),
('0046', 'Keyboard Logitech', 15, 'Keyboard USB', 'Rusak', 'Lab RPL 2'),
('0048', 'Monitor LG', 5, 'Monitor LED 24 inci', 'Baik', 'Lab RPL 1'),
('0049', 'Printer Epson', 3, 'Printer Ink Tank', 'Rusak', 'Lab RPL 2');
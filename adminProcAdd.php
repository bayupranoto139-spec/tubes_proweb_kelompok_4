<?php
session_start();
require "mysql.php";

// proteksi admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Akses ditolak!");
}

// ambil data dari form
$nama_menu = $_POST["nama_menu"];
$harga = $_POST["harga"];
$deskripsi = $_POST["deskripsi"];
$kategori = $_POST["kategori"];

// proses upload foto
$foto = $_FILES["foto"]["name"];
$tmp = $_FILES["foto"]["tmp_name"];
$folder = "foto/" . $foto;

// pindahkan file
move_uploaded_file($tmp, $folder);

// simpan ke database
$stmt = $mysql->prepare("INSERT INTO menu (nama_menu, harga, deskripsi, kategori, foto) 
                         VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $nama_menu, $harga, $deskripsi, $kategori, $foto);

if ($stmt->execute()) {
    echo "<script>alert('Menu berhasil ditambahkan!'); window.location='adminAddMenu.php';</script>";
} else {
    echo "<script>alert('Gagal menambahkan menu!'); history.back();</script>";
}
?>

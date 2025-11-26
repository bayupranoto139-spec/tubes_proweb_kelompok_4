<?php
session_start();
require "mysql.php";

// proteksi jika bukan admin
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    die("Akses ditolak!");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Menu Baru</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        form { width: 320px; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        input, textarea, select {
            width: 100%; padding: 8px; margin-bottom: 10px;
            border: 1px solid #aaa; border-radius: 5px;
        }
        button {
            padding: 10px; width: 100%; border: none;
            background: #28a745; color: white; cursor: pointer;
            border-radius: 5px; font-weight: bold;
        }
        button:hover { background: #1f8a39; }
    </style>
</head>

<body>

<h2>Tambah Menu Baru</h2>

<form action="addMenu.php" method="POST" enctype="multipart/form-data">
    <label>Nama Menu:</label>
    <input type="text" name="nama_menu" required>

    <label>Harga:</label>
    <input type="number" name="harga" required>

    <label>Deskripsi:</label>
    <textarea name="deskripsi" rows="3" required></textarea>

    <label>Kategori:</label>
    <select name="kategori" required>
        <option value="food">Food</option>
        <option value="drink">Drink</option>
    </select>

    <label>Foto Menu:</label>
    <input type="file" name="foto" required>

    <button type="submit">Tambah Menu</button>
</form>

</body>
</html>

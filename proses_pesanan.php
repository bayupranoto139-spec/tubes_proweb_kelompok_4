<?php
require 'mysql.php'; // koneksi: $mysql

// Ambil semua order + username user
$sqlOrders = "
    SELECT 
        o.order_id,
        o.user_id,
        o.tanggal,
        o.total_harga,
        u.username
    FROM orders o
    JOIN users u ON o.user_id = u.user_id
    ORDER BY o.tanggal DESC
";

$orders = mysqli_query($mysql, $sqlOrders);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pesanan User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div id="confirm-mini" style="display:none;"></div>
<!-- NAVBAR (opsional, sesuaikan dengan punyamu) -->
<nav class="lux-nav">
    <h2>17 COFFEE - Admin</h2>
    <div>
        <a href="adminHome.php">🏠</a>
        <a href="adminAddMenu.php">🍽️</a>
        <a href="isi_pesan.php">✉️</a>
        <a href="proses_pesanan.php">🧾</a>
    </div>
</nav>

<div class="hero-header">
    <img src="foto/kafe.jpg" class="hero-img" alt="Kafe">
    <div class="hero-overlay"></div>
    <div class="hero-text">
        <h1>Daftar Pesanan User</h1>
        <p>Berikut adalah pesanan yang sudah dibuat oleh user.</p>
    </div>
</div>

<table id="tampilan">
    <thead>
        <tr class="atas">
            <th>No</th>
            <th>ID Order</th>
            <th>Username</th>
            <th>Tanggal</th>
            <th>Detail Pesanan</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        while ($row = mysqli_fetch_assoc($orders)) :
            // Ambil item untuk setiap order
            $orderId = (int)$row['order_id'];

            $sqlItems = "
                SELECT 
                    oi.jumlah,
                    oi.subtotal,
                    m.nama_menu
                FROM order_items oi
                JOIN menu m ON oi.menu_id = m.menu_id
                WHERE oi.order_id = $orderId
            ";
            $items = mysqli_query($mysql, $sqlItems);
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td>#<?= htmlspecialchars($row['order_id']); ?></td>
            <td><?= htmlspecialchars($row['username']); ?></td>
            <td><?= htmlspecialchars($row['tanggal']); ?></td>
            <td>
                <ul style="padding-left: 18px; margin: 0;">
                    <?php while ($item = mysqli_fetch_assoc($items)) : ?>
                        <li>
                            <?= htmlspecialchars($item['nama_menu']); ?>
                            x <?= (int)$item['jumlah']; ?>
                            (Rp <?= number_format($item['subtotal'], 0, ',', '.'); ?>)
                        </li>
                    <?php endwhile; ?>
                </ul>
            </td>
            <td>
                Rp <?= number_format($row['total_harga'], 0, ',', '.'); ?>
            <td>
                <button class="delete-btn" onclick="hapusPesanan(<?= $row['order_id']; ?>)">Hapus</button>
            </td>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<footer>
    &copy; <?= date('Y'); ?> 17 Coffee
</footer>
<script src="cart.js?v=<?= time() ?>"></script>
</body>
</html>

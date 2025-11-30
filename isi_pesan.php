<?php
require 'mysql.php';

$query = "SELECT * FROM contact";
$result = mysqli_query($mysql, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>☕17 Coffee - Contact</title>
    <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
    <header>
        <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
        <div class="header-text">
            <h1>17 COFFEE</h1>
            <p>Choose Your Favourite Menu!</p>
        </div>
    </header>

    <nav id="main-nav">
        <button class="nav-toggle" id="navToggle">☰</button>
        <div class="nav-links" id="navLinks">
            <a href="adminHome.php">Home</a>
            <a href="adminAddMenu.php">Add Menu</a>
            <a href="isi_pesan.php">Feedback</a>
        </div>
    </nav>
    <h2 class="font">Contact Us</h2>

    <!--Form Kontak-->
    <table id="tampilan">
        <thead>
            <tr class="atas">
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor HP</th>
                <th>Pesan</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr class="isi">
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['nomor_hp']; ?></td>
                    <td><?= $row['pesan']; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>


    <!--Footer-->

    <footer class="font">
        <p> © Copyright by kelompok 5 2025</p>
    </footer>

    </footer>

  <script src="cart.js?v=<?= time() ?>"></script>
  <script>
document.getElementById("navToggle").onclick = function () {
    document.getElementById("navLinks").classList.toggle("show-nav");
};
</script>
</body>

</html>
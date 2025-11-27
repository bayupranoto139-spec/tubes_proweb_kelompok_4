<?php
include 'mysql.php';
?>
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>☕17 COFFEE - Drink</title>
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>

  <!--Navigasi-->

  <header>
    <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
    <div class="header-text">
      <h1>17 COFFEE</h1>
      <p>Choose Your Favourite Menu!</p>
    </div>
</header>

<nav id="main-nav">

    <!-- Hamburger button (tidak mengganggu style tombol kamu) -->
    <button class="nav-toggle" id="navToggle">☰</button>

    <div class="nav-links" id="navLinks">
        <a href="home.php">Home</a>
        <a href="drink.php">Drink</a>
        <a href="food.php">Food</a>
        <a href="contact.php">Contact</a>

        <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>"
              method="GET" class="nav-search">
            <input type="text" name="search" placeholder="Cari menu..." required>
            <button type="submit" class="search-btn">🔍</button>
        </form>
    </div>
</nav>


  <h2 class="font">Pesan Minuman Favoritmu</h2>

  <!-- ICON CART -->
<div class="cart-icon" id="cart-toggle">🛒</div>

<!-- PANEL CART -->
<div id="cart-panel">
    
    <span id="close-cart">✖</span>

    <div id="cart-content">
        <h2>Keranjang</h2>
        <div id="cart-container">
            Memuat...
        </div>
    </div>
</div>

  <!--Menu Minuman-->

  <section class="menu">
    <?php
    // Ambil data menu dari database
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if ($search !== '') {
      $query = "SELECT * FROM menu 
              WHERE kategori = 'drink' 
              AND nama_menu LIKE '%$search%'";
    } else {
      $query = "SELECT * FROM menu WHERE kategori = 'drink'";
    }

    $result = mysqli_query($mysql, $query);

    if (mysqli_num_rows($result) == 0) {
    echo "<p class='no-result'>Menu tidak ditemukan.</p>";
}


    while ($row = mysqli_fetch_assoc($result)) {
      echo "<div class='item'>";
      echo "<img src='foto/" . $row['foto'] . "' alt='" . $row['nama_menu'] . "' class='coffee-img'/>";
      echo "<h2>" . $row['nama_menu'] . " - Rp" . number_format($row['harga'], 0, ',', '.') . "</h2>";
      echo "<p>" . $row['deskripsi'] . "</p><br><br>";
      echo "<div class='btn-group'>";
      echo "<button class='order' data-id='" . $row['menu_id'] . "'>Pesan</button>";
      echo "<div class='btn'>";
      echo "<button class='plus' data-id='" . $row['menu_id'] . "'>+</button>";
      echo '<span class="zero" id="qty-' . $row['menu_id'] . '">0</span>';
      echo "<button class='minus' data-id='" . $row['menu_id'] . "'>-</button>";
      echo "</div>";
      echo "</div>";
      echo "</div>";
    }
    ?>
  </section>

  <!--Footer-->

  <footer class="font">
    <p> © Copyright by kelompok 5 2025</p>
  </footer>

  <script src="cart.js"></script>
  <script>
document.getElementById("navToggle").onclick = function () {
    document.getElementById("navLinks").classList.toggle("show-nav");
};
</script>


</body>

</html>
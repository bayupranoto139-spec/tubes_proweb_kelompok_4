<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>☕17 Coffee - Food</title>
  <link rel="stylesheet" href="style.css?v=<?= filemtime(__DIR__ . '/style.css') ?>">
</head>

<body>
  <header>
    <h1>17 Coffee</h1>
    <p>Choose Your Favourite Menu!</p>
  </header>

  <!--Navigasi-->

  <nav>
    <a href="home.php">Home</a>
    <a href="drink.php">Drink</a>
    <a href="food.php">Food</a>
    <a href="contact.php">Contact</a>
 </nav>
 <h2 class="font">Pesan Makanan Favoritmu</h2>

  <!--Menu Makanan-->

  <section class="menu">
    <div class="item">
      <img src="foto/Ayam Geprek.jpg" alt="Ayam Geprek" class="coffee-img" />
      <h3>Ayam Geprek - Rp20.000</h3>
      <p>Ayam dengan sambal geprek</p>
     <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/Ayam Penyet.jpg" alt="Ayam Penyet" class="coffee-img" />
      <h3>Ayam Penyet - Rp20.000</h3>
      <p>Ayam penyet dengan sambel </p>
      <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/Mie Goreng.jpg" alt="Mie Goreng" class="coffee-img" />
      <h3>Mie Goreng - Rp15.000</h3>
      <p>Mie goreng dengan bumbu khas</p>
     <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/mieayamm.jpg" alt="Mie Ayam" class="coffee-img" />
      <h3>Mie Ayam - Rp15.000</h3>
      <p>Mie ayam dengan kuah kaldu ayam</p>
     <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/Nasilemak.jpg" alt="Nasi Lemak" class="coffee-img" />
      <h3>Nasi Lemak - Rp20.000</h3>
      <p>Nasi dengan topping lengkap</p>
      <br>
     <button>Pesan</button>
    </div>

    <div class="item">
      <img src="foto/satekacang.jpg" alt="Sate Kacang" class="coffee-img" />
      <h3>Sate Kacang - Rp15.000</h3>
      <p>Sate ayam dengan bumbu Kacang</p>
      <br>
      <button>Pesan</button>
    </div>
</section>

  <!--Form Pemesanan-->

    <section class="form-section">
    <h2>Form Pemesanan</h2>
    <form id="orderForm">
           <input type="text" id="nama" placeholder="Nama Pemesan" required>
      <input type="text" id="alamat" placeholder="Alamat Pengiriman" required>
      <input type="text" id="nohp" placeholder="Nomor HP" required>
      <p>Total: Rp0</p>
      <button type="submit">Kirim Pesanan</button>
    </form>
    </section>

  <!--Footer-->
    
     <footer class="font">
      <p> © Copyright by kelompok 5 2025</p>
    </footer>


</body>
</html>

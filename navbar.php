<header>
    <img src="foto/kafe.jpg" alt="Header Image" class="header-img">
    <div class="header-text">
      <h1>17 COFFEE</h1>
      <p>Choose Your Favourite Menu!</p>
    </div>
</header>

<nav>
    <a href="home.php">Home</a>
    <a href="drink.php">Drink</a>
    <a href="food.php">Food</a>
    <a href="contact.php">Contact</a>

    <form action="<?php echo basename($_SERVER['PHP_SELF']); ?>" method="GET" class="nav-search">
    <input type="text" name="search" placeholder="Cari menu..." required>
    <button type="submit" class="search-btn">🔍</button>
    </form>
</nav>
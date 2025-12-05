<nav class="lux-nav">
  <h2>17 COFFEE</h2>

  <div class="nav-right">
      <a href="home.php">🏠</a>
      <a href="food.php">🍽️</a>
      <a href="drink.php">🥤</a>
      <a href="contact.php">✉️</a>
    </div>

    <div class="search-container">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Cari menu..."
                   value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
            <button type="submit">✧⌕</button>
        </form>
    </div>
</nav>

<!-- Hamburger -->
<div class="hamburger" onclick="toggleMenu()">☰</div>

<!-- Mobile menu -->
<div class="mobile-menu" id="mobileMenu">
    <a href="home.php">🏠 Home</a>
    <a href="food.php">🍽️ Food</a>
    <a href="drink.php">🥤 Drink</a>
    <a href="contact.php">✉️ Contact</a>
</div>

<?php
  // Init session
  session_start();
  // Include db config
  require_once 'database.php';

  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: store-login.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="index.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
  <title>StoreManagerHelp Store Dashboard</title>
</head>
<body>
      <nav>
  <ul>
  <li><a class="active" href="store-dashboard.php"><h3>Panel Główny</h3></a></li>
  <li><a href="store-product-sell.php"><h3>Sprzedaż</h3></a></li>
  <li><a href="store-product-add.php"><h3>Dodaj do bazy</h3></a></li>
  <li><a href="store-new-products.php"><h3>Kupno</h3></a></li>
  <div class="dropdown">
    <button class="dropbtn"><h3>Statystyki</h3> 
 
    </button>
    <div class="dropdown-content">
      <a href="store-dairy-statistics/store-statistics-dairy.php">Nabiał</a>
      <a href="store-alcohol-statistics/store-statistics-alcohol.php">Alkohol</a>
      <a href="store-tobacco-statistics/store-statistics-tobacco.php">Wyroby Tytoniowe</a>
      <a href="store-snacks-statistics/store-statistics-snacks.php">Przekąski</a>
      <a href="store-sweets-statistics/store-statistics-sweets.php">Słodycze</a>
      <a href="store-bakery-statistics/store-statistics-bakery.php">Pieczywo</a>
      <a href="store-vegetables-statistics/store-statistics-vegetables.php">Warzywa</a>
      <a href="store-fruits-statistics/store-statistics-fruits.php">Owoce</a>
      <a href="store-jam-statistics/store-statistics-jam.php">Przetwory Warzywne i Owocowe</a>
      <a href="store-meat-statistics/store-statistics-meat.php">Przetwory Mięsne</a>
      <a href="store-fish-statistics/store-statistics-fish.php">Przetwory Rybne</a>
      <a href="store-spices-statistics/store-statistics-spices.php">Przyprawy</a>
      <a href="store-cosmetics-statistics/store-statistics-cosmetics.php">Kosmetyki</a>
      <a href="store-cleaning-statistics/store-statistics-cleaning.php">Środki Czystości</a>
      <a href="store-beverages-statistics/store-statistics-beverages.php">Soki i Napoje</a>
      <a href="store-tea-statistics/store-statistics-tea.php">Kawa i Herbata</a>
    </div>
  </div> 
  <li style="float:right"><a class="logout" href="store-logout.php"><h3>Wyloguj się</h3></a></li>
</ul>
  </nav>
  <main>

      
          <h2>Witaj <?php echo $_SESSION['first_name']; ?>!<br> Życzę dużego utargu!</h2>
          <a href="store-product-add.php" ><button class="button"><h2>Stwórz bazę produktów</h2></button></a>
          <a href="store-new-products.php" ><button class="button"><h2>Dodaj produkty do bazy</h2></button></a>
          <a href="store-product-sell.php"><button class="button"><h2> Dodaj do sprzedanych</h2></button></a>
          <a href="store-product-view.php" ><button class="button"><h2>Przejrzyj swoje produkty</h2></button></a>
          <a href="main-store-statistics/store-statistics.php" ><button class="button"><h2>Przejdź do statystyk</h2></button></a>
          <a href="store-logout.php" ><button class="log-out-button"><h2>Wyloguj się</h2></button></a>

</main>
</body>
</html> 
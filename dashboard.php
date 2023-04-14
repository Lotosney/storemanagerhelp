<?php
  session_start();
  require_once 'database.php';
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
    header('location: login.php');
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
  <title>StoreManagerHelp - Dashboard</title>
</head>
<body>
      <nav>
  <ul>
  <li><a class="active" href="dashboard.php"><h3>Panel Główny</h3></a></li>
  <li><a href="sell.php"><h3>Sprzedaż</h3></a></li>
  <li><a href="product-add.php"><h3>Dodaj do bazy</h3></a></li>
  <li><a href="purchase.php"><h3>Kupno</h3></a></li>
  <div class="dropdown">
    <button class="dropbtn"><h3>Statystyki</h3> 
 
    </button>
    <div class="dropdown-content">
      <a  href="main/main-statistics.php">Główne Statystyki</a>
      <a href="dairy/statistics.php">Nabiał</a>
      <a href="alcohol/statistics.php">Alkohol</a>
      <a href="tobacco/statistics.php">Wyroby Tytoniowe</a>
      <a href="snacks/statistics.php">Przekąski</a>
      <a href="sweets/statistics.php">Słodycze</a>
      <a href="bakery/statistics.php">Pieczywo</a>
      <a href="vegetables/statistics.php">Warzywa</a>
      <a href="fruits/statistics.php">Owoce</a>
      <a href="jam/statistics.php">Przetwory Warzywne i Owocowe</a>
      <a href="meat/statistics.php">Przetwory Mięsne</a>
      <a href="fish/statistics.php">Przetwory Rybne</a>
      <a href="spices/statistics.php">Przyprawy</a>
      <a href="cosmetics/statistics.php">Kosmetyki</a>
      <a href="cleaning/statistics.php">Środki Czystości</a>
      <a href="beverages/statistics.php">Soki i Napoje</a>
      <a href="tea/statistics.php">Kawa i Herbata</a>
    </div>
  </div> 
  <li style="float:right"><a class="logout" href="logout.php"><h3>Wyloguj się</h3></a></li>
</ul>
  </nav>
  <main>

      
          <h2>Witaj <?php echo $_SESSION['first_name']; ?>!<br> Życzę dużego utargu!</h2>
          <button class="button"><a href="product-add.php" ><h2>Stwórz bazę produktów</h2></a></button>
          <button class="button"><a href="purchase.php" ><h2>Dodaj produkty do bazy</h2></button></a>
          <button class="button"><a href="sell.php"><h2> Dodaj do sprzedanych</h2></button></a>
          <button class="button"><a href="product-view.php" ><h2>Przejrzyj swoje produkty</h2></button></a>
          <button class="button"><a href="main/store-statistics.php" ><h2>Przejdź do statystyk</h2></button></a>
          <button class="button"><a href=single-product-statistics.php" ><h2>Sprzedaż danego produktu</h2></button></a>
          <button class="log-out-button"><a href="logout.php" ><h2>Wyloguj się</h2></button></a>

</main>
</body>
</html> 
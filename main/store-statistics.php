<?php
// Init session
session_start();
// Include db config
require_once '../database.php';

// Validate login
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
  header('location: ../login.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" type="text/css" href="store-statistics.css">
  <link rel="stylesheet" type="text/css" href="../navbar.css">
  <title>StoreManagerHelp Panel statystyczny</title>
</head>

<body>
  <nav>
    <ul>
      <li><a href="../dashboard.php">
          <h3>Panel Główny</h3>
        </a></li>
      <li><a href="../sell.php">
          <h3>Sprzedaż</h3>
        </a></li>
      <li><a href="../product-add.php">
          <h3>Dodaj do bazy</h3>
        </a></li>
      <li><a href="../purchase.php">
          <h3>Kupno</h3>
        </a></li>
      <div class="dropdown">
        <button class="dropbtn">
          <h3>Statystyki</h3>

        </button>
        <div class="dropdown-content">
          <a href="main-statistics.php">Główne Statystyki</a> 
          <a href="../single/statistics.php">Statystyki Produktu</a>
          <a href="../type/statistics.php">Statystyki Rodzajów</a>
    

      </div>
      <li style="float:right"><a class="logout" href="../logout.php">
          <h3>Wyloguj się</h3>
        </a></li>
    </ul>
  </nav>
  <h1>Panel Statystyk</h1>
  <div class="container">

    <div class="subcontainer2">
      <a href="main.php"><button class="button2">
          <h2>Główne Statystyki</h2>
        </button></a>
    </div>
    <div class="subcontainer2">
      <a href="../single/single-product-statistics.php"><button class="button2">
          <h2>Statystyki poszczególnych produktów</h2>
        </button></a>
    </div>
   <div class="subcontainer2">
      <a href="../type/statistics.php"><button class="button2">
          <h2>Satystyki poszczególnych rodzajów</h2>
        </button></a>


    </div>



</body>

</html>
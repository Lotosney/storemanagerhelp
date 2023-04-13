<?php
  // Init session
  session_start();
  // Include db config
  require_once '../database.php';

  // Validate login
  if(!isset($_SESSION['email']) || empty($_SESSION['email'])){
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
  <link rel="stylesheet" type="text/css" href="statistics.css">
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
          <a href="../dairy/statistics.php">Nabiał</a>
          <a href="../alcohol/statistics.php">Alkohol</a>
          <a href="../tobacco/statistics.php">Wyroby Tytoniowe</a>
          <a href="../snacks/statistics.php">Przekąski</a>
          <a href="../sweets/statistics.php">Słodycze</a>
          <a href="../bakery/statistics.php">Pieczywo</a>
          <a href="../vegetables/statistics.php">Warzywa</a>
          <a href="../fruits/statistics.php">Owoce</a>
          <a href="../jam/statistics.php">Przetwory Warzywne i Owocowe</a>
          <a href="../meat/statistics.php">Przetwory Mięsne</a>
          <a href="../fish/statistics.php">Przetwory Rybne</a>
          <a href="../spices/statistics.php">Przyprawy</a>
          <a href="../cosmetics/statistics.php">Kosmetyki</a>
          <a href="../cleaning/statistics.php">Środki Czystości</a>
          <a href="../beverages/statistics.php">Soki i Napoje</a>
          <a href="../tea/statistics.php">Kawa i Herbata</a>
        </div>
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
    <div class="subcontainer">
      <a href="../dairy/statistics.php"><button class="button">
          <h2>Nabiał</h2>
        </button></a>
      <a href="../bakery/statistics.php"><button class="button">
          <h2>Pieczywo</h2>
        </button></a>
      <a href="../alcohol/statistics.php"><button class="button">
          <h2>Alkohol</h2>
        </button></a>
    </div>


    <div class="subcontainer">
      <a href="../sweets/statistics.php"><button class="button">
          <h2>Słodycze</h2>
        </button></a>
      <a href="../snacks/statistics.php"><button class="button">
          <h2>Przekąski</h2>
        </button></a>
      <a href="../spices/statistics.php"><button class="button">
          <h2>Przyprawy</h2>
        </button></a>


    </div>
    <div class="subcontainer">
      <a href="../cosmetics/statistics.php"><button class="button">
          <h2>Kosmetyki</h2>
        </button></a>
      <a href="../cleaning/statistics.php"><button class="button">
          <h2>Środki czystości</h2>
        </button></a>
      <a href="../fruits/statistics.php"><button class="button">
          <h2>Owoce</h2>
        </button></a>


    </div>
    <div class="subcontainer">
      <a href="../vegetables/statistics.php"><button class="button">
          <h2>Warzywa</h2>
        </button></a>
      <a href="../beverages/statistics.php"><button class="button">
          <h2>Soki i Napoje</h2>
        </button></a>
      <a href="../tobacco/statistics.php"><button class="button">
          <h2>Produkty Tytoniowe</h2>
        </button></a>


    </div>
    <div class="subcontainer">
      <a href="../tea/statistics.php"><button class="button">
          <h2>Kawa i Herbata</h2>
        </button></a>
      <a href="../meat/statistics.php"><button class="button">
          <h2>Przetwory Mięsne</h2>
        </button></a>
      <a href="../fish/statistics.php"><button class="button">
          <h2>Przetwory Rybne</h2>
        </button></a>


    </div>
    <div class="subcontainer2">
      <a href="../jam/statistics.php"><button class="button2">
          <h2>Przetwory Warzyne i Owocowe</h2>
        </button></a>


    </div>

    <a href="../logout.php">Wyloguj się</a>

  </div>
</body>
</html> 
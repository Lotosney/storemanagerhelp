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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StoreManagerHelp</title>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
  <script src="toggle.js"></script>
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="../navbar.css">


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
          <a class="active" href="main-statistics.php">Główne Statystyki</a>
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
  <section class="main">
    <div class="charts">

      <button class="toggle-button" onclick="toggle()">
        <h3>Sprzedaż/Zakupy</h3>
      </button>

      <div class="sales" id="sales">

        <div class="chart">
          <h2>Sprzedaż -ilość</h2>
          <input onchange="startDateFilter(this)" type="date" id="startdate" value="2023-03-01" min="2023-03-01">
          <input onchange="endDateFilter(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="salesAmountChart"></canvas>
        </div>

        <div class="chart">
          <h2>Sprzedaż - Zysk</h2>
          <input onchange="startDateFilter2(this)" type="date" id="startdate" value="2023-03-01" min="2023-03-01">
          <input onchange="endDateFilter2(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="salesIncomeChart"></canvas>
        </div>
      </div>
      <div class="purchases" id="purchases">


        <div class="chart">
          <h2>Zakupy - ilość </h2>
          <input onchange="startDateFilter3(this)" type="date" id="startdate" value="2023-04-01" min="2023-03-01">
          <input onchange="endDateFilter3(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="purchaseAmountChart"></canvas>
        </div>
        <div class="chart">
          <h2>Zakupy - wydatki </h2>
          <input onchange="startDateFilter4(this)" type="date" id="startdate" value="2023-04-01" min="2023-03-01">
          <input onchange="endDateFilter4(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="purchasePaymentChart"></canvas>
        </div>


      </div>


    </div>

  </section>

  <?php include_once "sell-chart.php" ?>
  <?php include_once "purchase-chart.php" ?>


</body>

</html>
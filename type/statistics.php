<?php

session_start();
require_once '../database.php';
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
  header('location: ../login.php');
  exit;
}
$email = $_SESSION['email'];

$product_type = '';
$product_type_err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {



  $type = trim($_POST['product_type']);


  unset($stmt);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>StoreManagerHelp - Statystyki Rodzajów</title>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
  <script src="../main/toggle.js"></script>
  <link rel="stylesheet" type="text/css" href="../main/view.css">
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
          <a href="../main/main-statistics.php">Główne Statystyki</a>
          <a class="active" href="statistics.php">Statystyki Rodzajów</a>
          <a href="../single/statistics.php">Statystyki produktów</a>

        </div>
      </div>
      <li style="float:right"><a class="logout" href="../logout.php">
          <h3>Wyloguj się</h3>
        </a></li>
    </ul>
  </nav>
  <section class="main">
    <div class="choose_form>
  <h1>Sprawdź sprzedaż produktu</h1>
        <form action=" <?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
      <input list="product_type" type="product_type" name="product_type" placeholder="Wybierz typ produktu" class="<?php echo (!empty($product_type_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_type ?>">
      <datalist id="product_type">
        <option value="Pieczywo">
        <option value="Nabiał">
        <option value="Owoce">
        <option value="Warzywa">
        <option value="Środki Czystości">
        <option value="Słodycze">
        <option value="Przekąski">
        <option value="Przyprawy">
        <option value="Artykuły Tytoniowe">
        <option value="Alkohol">
        <option value="Kosmetyki">
        <option value="Soki i Napoje">
        <option value="Przetwory Mięsne">
        <option value="Przetwory Rybne">
        <option value="Przetwory Warzywne i Owocowe">
        <option value="Kawa i Herbata">


      </datalist>

      <span class="invalid-feedback"><?php echo $product_type_err; ?></span>
      <button class="button" type="submit" name="submit">Zatwierdź</button>


      </form>
    </div>
    <div class="charts">

      <button class="toggle-button" onclick="toggle()">
        <h3>Sprzedaż/zakupy</h3>
      </button>

      <div class="sales" id="sales">
        <h2>Sprzedaż</h2>
        <div class="chart">
          <input onchange="startDateFilter(this)" type="date" id="startdate" value="2023-03-01" min="2023-03-22">
          <input onchange="endDateFilter(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="salesChart"></canvas>
        </div>

      </div>

      <div class="purchases" id="purchases">
        <h2>Zakupy </h2>
        <div class="chart">
          <input onchange="startDateFilter2(this)" type="date" id="startdate" value="2023-03-01" min="2023-03-01">
          <input onchange="endDateFilter2(this)" type="date" id="enddate" value="2023-03-31" min="2023-03-31">
          <canvas id="purchaseChart"></canvas>
        </div>

      </div>
      <form>
        <h1> <?php echo json_encode($type); ?></h1>
        <div class="tab">
          <table class="table">
            <thead>
              <tr>

                <th>Nazwa produktu
                  <button name="name_asc"> &#8593</button>
                  <button name="name_desc"> &#8595</button>
                </th>
                <th>Marka produktu
                  <button name="brand_asc"> &#8593</button>
                  <button name="brand_desc"> &#8595</button>
                </th>
                <th>Ilość
                  <button name="product_amount_asc"> &#8593</button>
                  <button name="product_amount_desc"> &#8595</button>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php require_once 'statistics-back.php'; ?>

            </tbody>
          </table>
        </div>
      </form>
    </div>
    <div class=table-container>
      <h2>Udział marek w asortymencie</h2>
      <div class="pie-chart">
        <canvas id="myPieChart"></canvas>
      </div>
    </div>
  </section>
  <?php include_once "pie-chart.php" ?>
  <?php include_once "sales-chart.php" ?>
  <?php include_once "purchase-chart.php" ?>


</body>

</html>
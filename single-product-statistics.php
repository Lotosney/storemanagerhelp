<?php
session_start();
require_once 'database.php';


if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {

    header('location:login.php');
    exit;
}
$email = $_SESSION['email'];


$product_name = $product_brand = $product_type = '';
$product_name_err = $product_brand_err =  $product_type_err = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


     
        $name=  trim($_POST['product_name']);
        $brand = trim($_POST['product_brand']);
        $type =trim($_POST['product_type']);
    

    unset($stmt);
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0 "></script>
    <link rel="stylesheet" href="single-product-statistics.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <title>StoreManagerHelp - Statystyka Pojedyńczego Produktu</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="dashboard.php">
                    <h3>Panel Główny</h3>
                </a></li>
            <li><a href="sell.php">
                    <h3>Sprzedaż</h3>
                </a></li>
            <li><a href="product-add.php">
                    <h3>Dodaj do bazy</h3>
                </a></li>
            <li><a href="purchase.php">
                    <h3>Kupno</h3>
                </a></li>
            <div class="dropdown">
                <button class="dropbtn">
                    <h3>Statystyki</h3>

                </button>
                <div class="dropdown-content">
                    <a href="main/main-statistics.php">Główne Statystyki</a>
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
            <li style="float:right"><a class="logout" href="logout.php">
                    <h3>Wyloguj się</h3>
                </a></li>
        </ul>
    </nav>
    <main>
        <h1>Sprawdź sprzedaż produktu</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" novalidate>
            <input type="text" name="product_name" placeholder="Nazwa Produktu" class="<?php echo (!empty($product_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_name; ?>">
            <span class="invalid-feedback"><?php echo $product_name_err; ?></span>
            <input type="text" name="product_brand" placeholder="Marka" class="<?php echo (!empty($product_brand_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_brand ?>">
            <span class="invalid-feedback"><?php echo $product_brand_err; ?></span>
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
        <div class="chart">
            <input onchange="startDateFilter(this)" type="date" id="startdate" value="2023-04-01" min="2023-04-01">
            <input onchange="endDateFilter(this)" type="date" id="enddate" value="2023-04-30" min="2023-04-01">
            <canvas id="salesChart"></canvas>
           <h3><?php echo json_encode($name); ?></h3> 
        </div>

    </main>

    <?php include_once "single-product-chart.php" ?>
</body>

</html>
<?php
session_start();
require_once 'database.php';
if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

$product_name = $product_brand  = $product_amount   = $product_retail_price = $product_type = $product_sell_date= $product_vat ='';
$product_name_err = $product_brand_err  = $product_amount_err   = $product_retail_price_err = $product_type_err = $product_sell_date_err = $product_vat_err ='';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);

    $product_name =  trim($_POST['product_name']);
    $product_brand = trim($_POST['product_brand']);
    $product_type = trim($_POST['product_type']);
    $product_amount = trim($_POST['product_amount']);
    $product_retail_price  = trim($_POST['product_retail_price']);
    $product_vat = trim($_POST['product_vat']);
    $final_price = round($product_retail_price * ((100-$product_vat) / 100), 2);
    $store_email = trim($_POST['store_email']);
    $sell_date = trim($_POST['sell_date']);



    if (empty($product_name)) {
        $product_name = 'Wprowadź nazwę produktu';
    } else {
        $sql = 'SELECT product_id FROM products WHERE product_name = :product_name AND store_email =:store_email';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':store_email', $store_email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                if ($stmt->rowCount() === 0) {
                    $product_name_err = 'Tego produktu nie ma w bazie';
                }
  
            } else {
                die('Coś poszło nie tak');
            }
        }

        unset($stmt);
    }


    if (empty($product_name)) {
        $product_name_err = 'Wprowadź nazwę produktu';
    }
    if (empty($product_brand)) {
        $product_brand_err = 'Wprowadź markę produktu';
    }
    if (empty($product_type)) {
        $product_type_err = 'Wybierz rodzaj produktu';
    }
    if (empty($product_retail_price)) {
        $product_retail_price_err = 'Wprowadź cenę detaliczną';
    }
    if (empty($product_vat)) {
        $product_vat_err = 'Podaj stawkę vat';
    }




    if (
        empty($product_name_err) && empty($product_brand_err) && empty($product_type_err)  && empty($product_retail_price_err) && empty($product_vat_err) 
    ) {

        $sql = 'INSERT INTO products_sold (product_name, product_brand, product_type, product_amount, product_retail_price, product_vat,final_price, store_email, sell_date
 
         ) VALUES (:product_name, :product_brand, :product_type, :product_amount,  :product_retail_price, :product_vat, :final_price, :store_email, :sell_date

         ); UPDATE total_products SET product_amount = product_amount - :product_amount WHERE product_name = :product_name and store_email =:store_email ';

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_brand', $product_brand, PDO::PARAM_STR);
            $stmt->bindParam(':product_type', $product_type, PDO::PARAM_STR);
            $stmt->bindParam(':product_amount', $product_amount, PDO::PARAM_INT);
            $stmt->bindParam(':product_retail_price', $product_retail_price, PDO::PARAM_STR);
            $stmt->bindParam(':product_vat', $product_vat, PDO::PARAM_STR);
            $stmt->bindParam(':final_price', $final_price, PDO::PARAM_STR);
            $stmt->bindParam(':store_email', $store_email, PDO::PARAM_STR);
            $stmt->bindParam(':sell_date', $sell_date, PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('location: sell.php');
            } else {
                die('Coś poszło nie tak');
            }
        }
        unset($stmt);

        
    }

    unset($pdo);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="store-login.css">
    <link rel="stylesheet" type="text/css" href="navbar.css">
    <title>StoreManagerHelp - Zarejestruj Sprzedaż</title>
</head>

<body>
    <nav>
  <ul>
  <li><a  href="dashboard.php"><h3>Panel Główny</h3></a></li>
  <li><a class="active" href="sell.php"><h3>Sprzedaż</h3></a></li>
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
        <h1>Sprzedaj produkt</h1>
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
                <option value="Środki czystości">
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
            <input type="hidden" name="product_amount" value="<?php echo '1' ?>" />
            <input type="hidden" name="product_amount2" value="<?php echo '1' ?>" />
            <input type="number" step="0.01" min="0"  name="product_retail_price" placeholder="Cena Detaliczna" class="<?php echo (!empty($product_retail_price_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_retail_price; ?>">
            <span class="invalid-feedback"><?php echo $product_retail_price_err; ?></span>
            <input list="product_vat" type="product_vat" name="product_vat" placeholder="Wybierz stawke VAT" class="<?php echo (!empty($product_vat_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $product_vat ?>">
            <datalist id="product_vat">
                <option value="0">
                <option value="5">
                <option value="8">
                <option value="23">
            </datalist>
            <span class="invalid-feedback"><?php echo $product_vat_err; ?></span>
            <input type="hidden" name="store_email" value="<?php echo $_SESSION['email']; ?>" />
            <input type="hidden" name="sell_date" value="<?php echo date('y.m.d'); ?>" />
            <!-- <input type="date" step="any" name="expiry_date" placeholder="Data ważności" class="<?php echo (!empty($expiry_date_err)) ? 'is-invalid' : ''; ?>" value="<?php echo date($expiry_date); ?>">
            <span class="invalid-feedback"><?php echo $expiry_date_err; ?></span> -->
            <button class="button" type="submit" name="submit">Zatwierdź</button>

        </form>

    </main>


</body>

</html>
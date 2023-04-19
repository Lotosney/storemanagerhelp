<?php

session_start();


require_once 'database.php';

if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {
    header('location: login.php');
    exit;
}

$product_name  = $product_amount = $product_type= $product_brand = $supplier_name='';
$product_name_err  = $product_amount_err  = $product_type_err= $product_brand_err= $supplier_name_err= '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_POST = filter_input_array(INPUT_POST, FILTER_UNSAFE_RAW);


    $product_name =  trim($_POST['product_name']);
    $product_brand = trim($_POST['product_brand']);
    $product_type = trim($_POST['product_type']);
    $supplier_name = trim($_POST['supplier_name']);
    $product_amount = trim($_POST['product_amount']);
    $store_email = trim($_POST['store_email']);
    if (empty($product_name)) {
        $product_name_err = 'wprowadź nazwę produktu';
        
    }
    else if (empty($product_brand)) {
        $product_brand_err = 'Wprowadź markę produktu';
    }
    else if (empty($supplier_name)) {
        $supplier_name_err = 'Wprowadź  dostawcę';

    } else {

        $sql = 'SELECT product_name FROM total_products WHERE product_name = :product_name AND product_brand =:product_brand AND supplier_name =:supplier_name AND store_email =:store_email';

        if ($stmt = $pdo->prepare($sql)) {

            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_brand', $product_brand, PDO::PARAM_STR);
            $stmt->bindParam(':supplier_name', $supplier_name, PDO::PARAM_STR);
            $stmt->bindParam(':store_email', $store_email, PDO::PARAM_STR);

            if ($stmt->execute()) {

                if ($stmt->rowCount() === 1) {
                    $product_name_err = 'Ten produkt już istnieje';
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
    if (empty($supplier_name)) {
        $supplier_name_err = 'Wprowadź  dostawcę';
    }


    if (
        empty($product_name_err) && empty($product_type_err) && empty($product_brand_err) && empty($supplier_name_err) 
    ) {

        $sql = 'INSERT INTO total_products (product_name, product_brand, product_type,  product_amount, supplier_name,  store_email
 
         ) VALUES (:product_name, :product_brand, :product_type, :product_amount,  :supplier_name,  :store_email

         )';
         
         

        if ($stmt = $pdo->prepare($sql)) {
            $stmt->bindParam(':product_name', $product_name, PDO::PARAM_STR);
            $stmt->bindParam(':product_brand', $product_brand, PDO::PARAM_STR);
            $stmt->bindParam(':product_type', $product_type, PDO::PARAM_STR);
            $stmt->bindParam(':product_amount', $product_amount, PDO::PARAM_STR);
            $stmt->bindParam(':supplier_name', $supplier_name, PDO::PARAM_STR);
            $stmt->bindParam(':store_email', $store_email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                header('location: product-add.php');
            } 
            else {
                die('Coś poszło nie tak2');
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
    <title>StoreManagerHelp - Dodaj Do Bazy</title>
</head>

<body>
    <nav>
  <ul>
  <li><a  href="dashboard.php"><h3>Panel Główny</h3></a></li>
  <li><a  href="sell.php"><h3>Sprzedaż</h3></a></li>
  <li><a class="active" href="product-add.php"><h3>Dodaj do bazy</h3></a></li>
  <li><a  href="purchase.php"><h3>Kupno</h3></a></li>
  <div class="dropdown">
    <button class="dropbtn"><h3>Statystyki</h3> 
 
    </button>
    <div class="dropdown-content">
      <a  href="main/main-statistics.php">Główne Statystyki</a>
      <a href="type/statistics.php">Statystyki Rodzajów</a>
      <a href="single/statistics.php">Statystyki Produktu</a>
    </div>

  </div> 
  <li style="float:right"><a class="logout" href="logout.php"><h3>Wyloguj się</h3></a></li>
</ul>
  </nav>
    <main>
        <h1>Dodaj produkt</h1>
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
            <input type="hidden" name="product_amount" value="<?php echo '0' ?>" />
            <input type="text" name="supplier_name" placeholder="Dostawca" class="<?php echo (!empty($supplier_name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $supplier_name; ?>">
            <span class="invalid-feedback"><?php echo $supplier_name_err; ?></span>
            <input type="hidden" name="store_email" value="<?php echo $_SESSION['email']; ?>" />
            <button  type="submit" name="submit" class="button">Zatwierdź</button>

        </form>

    </main>


</body>

</html>
<?php
session_start();
require_once 'database.php';


if (!isset($_SESSION['email']) || empty($_SESSION['email'])) {

	header('location:login.php');
	exit;
}
$email = $_SESSION['email'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="product-view.css">
		<link rel="stylesheet" type="text/css" href="navbar.css">

	<title>StoreManagerHelp - Lista Produktów</title>
	</head>

<body>
    <nav>
  <ul>
  <li><a href="dashboard.php"><h3>Panel Główny</h3></a></li>
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
<h1>Przegląd produktów</h1>
<div class="table-container">
	<form>
		<table class="table ">
			<thead class="alert-info">
				<tr>
					<th>Nazwa Produktu <button name="product_asc"> &#8593</button>
						<button name="product_desc"> &#8595</button>
					</th>

					<th>Marka
						<button name="brand_asc"> &#8593</button>
						<button name="brand_desc"> &#8595</button>
					</th>
					<th>Dostawca
						<button name="supplier_name_asc"> &#8593</button>
						<button name="supplier_name_ desc"> &#8595</button>
					</th>
					<th>Ilość
						<button name="total_amount_asc"> &#8593</button>
						<button name="total_amount_desc"> &#8595</button>
					</th>

				</tr>
			</thead>
			<tbody>
			<?php require_once 'product-view-back.php'; ?>

			</tbody>
		</table>
	</form>
</div>

</body>

</html>
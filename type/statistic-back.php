<?php
$type = trim($_POST['product_type']);
if (isset($_GET['name_asc'])) {
	$query = $pdo->prepare("SELECT  `product_name`,  `product_amount`, `product_brand` FROM `total_products` WHERE `store_email` =  '".$email."' 
    AND `product_type` = '" . $type . "' ORDER BY `product_name` ASC  ");
	$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>
            			<td>" . $row['product_amount'] . "</td>					
            			
					</tr>";
					}
				} else if (isset($_GET['name_desc'])) {
					$query = $pdo->prepare("SELECT  `product_name`, `product_amount`, `product_brand` FROM `total_products` WHERE `store_email` =  '".$email."' AND `product_type` = '" . $type . "' ORDER BY `product_name` DESC");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>			
            			<td>" . $row['product_amount'] . "</td>
					</tr>";
					}
			
				} 
				else if (isset($_GET['brand_asc'])) {
					$query = $pdo->prepare("SELECT `product_name`, `product_brand`,  `product_amount` FROM `total_products` WHERE `store_email` =  '".$email."' AND `product_type` = '" . $type . "' Order BY `product_brand` ASC  ");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>
            			<td>" . $row['product_amount'] . "</td>					
            			
					</tr>";
					}
				} else if (isset($_GET['brand_desc'])) {
					$query = $pdo->prepare("SELECT `product_name`,`product_brand`, `product_amount` FROM `total_products` WHERE `store_email` =  '".$email."' AND `product_type` = '" . $type . "' Order BY `product_brand` DESC");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>			
            			<td>" . $row['product_amount'] . "</td>
					</tr>";
					}
			
				} 
				else if (isset($_GET['product_amount_asc'])) {
					$query = $pdo->prepare("SELECT `product_name`,`product_brand`, `product_amount` FROM `total_products` WHERE `store_email` =  '".$email."' AND `product_type` = '" . $type . "' ORDER BY `product_amount` ASC");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>
            			<td>" . $row['product_amount'] . "</td>
					</tr>";
					}
				} else if (isset($_GET['product_amount_desc'])) {
					$query = $pdo->prepare("SELECT `product_name`,`product_brand`, `product_amount` FROM `total_products` WHERE `store_email` =  '".$email."' AND `product_type` = '" . $type . "'  ORDER  BY `product_amount` DESC");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>
            			<td>" . $row['product_amount'] . "</td>            
					</tr>";
					}
				}
				 else {
					$query = $pdo->prepare("SELECT `product_name`, `product_brand`, `product_amount`  FROM `total_products`  WHERE `store_email` =  '".$email."'  AND `product_type` = '" . $type . "' GROUP BY `Product_name` ");
					$query->execute();
					while ($row = $query->fetch()) {
						echo "<tr>
						<td>" . $row['product_name'] . "</td>
						<td>" . $row['product_brand'] . "</td>
            			<td>" . $row['product_amount'] . "</td>
				
					</tr>";
					}
				}
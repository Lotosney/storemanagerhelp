<?php
$query1 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`)
 AS `wholesale`, `purchase_time` FROM `products`  
 WHERE `product_type` = 'Alkohol' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query2 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`)
 AS `wholesale`, `purchase_time` FROM `products`  
 WHERE `product_type` = 'Nabiał' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");

$query3 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`)
 AS `wholesale`, `purchase_time` FROM `products` 
  WHERE `product_type` = 'Słodycze' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query4 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products` 
 WHERE `product_type` = 'Przekąski' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query5 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Owoce' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query6 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Warzywa' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query7 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Pieczywo' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query8 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Środki Czystości' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query9 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Kosmetyki' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query10 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Przyprawy' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query11 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Soki i Napoje' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query12 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Kawa i Herbata' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query13 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Artykuły Tytoniowe' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query14 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Przetwory Mięsne' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query15 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Przetwory Rybne' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query16 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount` * `product_wholesale_price`) 
AS `wholesale`, `purchase_time` FROM `products`  
WHERE `product_type` = 'Przetwory Warzywne i Owocowe' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");
$query1->execute();
$query2->execute();
$query3->execute();
$query4->execute();
$query5->execute();
$query6->execute();
$query7->execute();
$query8->execute();
$query9->execute();
$query10->execute();
$query11->execute();
$query12->execute();
$query13->execute();
$query14->execute();
$query15->execute();
$query16->execute();

while ($row = $query1->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray1[]= $row["wholesale"];
    $purchaseVolumeArray1[]= $row["summed_amount"];
    
}
while ($row = $query2->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray2[]= $row["wholesale"];
    $purchaseVolumeArray2[]= $row["summed_amount"];
    
}
while ($row = $query3->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray3[]= $row["wholesale"];
    $purchaseVolumeArray3[]= $row["summed_amount"];
    
}
while ($row = $query4->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray4[]= $row["wholesale"];
    $purchaseVolumeArray4[]= $row["summed_amount"];
    
}
while ($row = $query5->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray5[]= $row["wholesale"];
    $purchaseVolumeArray5[]= $row["summed_amount"];
    
}
while ($row = $query6->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray6[]= $row["wholesale"];
    $purchaseVolumeArray6[]= $row["summed_amount"];
    
}
while ($row = $query7->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray7[]= $row["wholesale"];
    $purchaseVolumeArray7[]= $row["summed_amount"];
    
}
while ($row = $query8->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray8[]= $row["wholesale"];
    $purchaseVolumeArray8[]= $row["summed_amount"];
    
}
while ($row = $query9->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray9[]= $row["wholesale"];
    $purchaseVolumeArray9[]= $row["summed_amount"];
    
}
while ($row = $query10->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray10[]= $row["wholesale"];
    $purchaseVolumeArray10[]= $row["summed_amount"];
    
}
while ($row = $query11->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray11[]= $row["wholesale"];
    $purchaseVolumeArray11[]= $row["summed_amount"];
    
}
while ($row = $query12->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray12[]= $row["wholesale"];
    $purchaseVolumeArray12[]= $row["summed_amount"];
    
}
while ($row = $query13->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray13[]= $row["wholesale"];
    $purchaseVolumeArray13[]= $row["summed_amount"];
    
}
while ($row = $query14->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray14[]= $row["wholesale"];
    $purchaseVolumeArray14[]= $row["summed_amount"];
    
}
while ($row = $query15->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray15[]= $row["wholesale"];
    $purchaseVolumeArray15[]= $row["summed_amount"];
    
}
while ($row = $query16->fetch()) {
    $dateArray2[]= $row["purchase_time"];
    $purchasePriceArray16[]= $row["wholesale"];
    $purchaseVolumeArray16[]= $row["summed_amount"];
    
}

?>
<script>
    const dateArrayJS3 = <?php echo json_encode($dateArray2); ?>; 
    const dateArrayJS4 = <?php echo json_encode($dateArray2); ?>; 


    const dateChartJS3 = dateArrayJS3.map((day,index)=>{
        let dayjs =new Date(day);
        return dayjs.setHours(0, 0,0,0)
    })

    const dateChartJS4 = dateArrayJS4.map((day,index)=>{
        let dayjs =new Date(day);
        return dayjs.setHours(0, 0,0,0)
    })


    const config3 = {
      type: 'line',
      data:{
      labels: dateChartJS3,
      datasets: [{
        label: 'Alkohol',
        data: <?php echo json_encode($purchaseVolumeArray1); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Nabiał',
        data: <?php echo json_encode($purchaseVolumeArray2); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },{
       
        label: 'Słodycze',
        data: <?php echo json_encode($purchaseVolumeArray3); ?>,
        backgroundColor: [
          'red',
        ],
        borderColor: [
          'red',
        ],
        borderWidth: 1
      },{
        label: 'Przekąski',
        data: <?php echo json_encode($purchaseVolumeArray4); ?>,
        backgroundColor: [
          'yellow',
        ],
        borderColor: [
          'yellow',
        ],
        borderWidth: 1
      },{
        label: 'Owoce',
        data: <?php echo json_encode($purchaseVolumeArray5); ?>,
        backgroundColor: [
          'orangered',
        ],
        borderColor: [
          'orangered',
        ],
        borderWidth: 1
      },{
       
        label: 'Warzywa',
        data: <?php echo json_encode($purchaseVolumeArray6); ?>,
        backgroundColor: [
          'brown',
        ],
        borderColor: [
          'brown',
        ],
        borderWidth: 1
      },
      {
        label: 'Pieczywo',
        data: <?php echo json_encode($purchaseVolumeArray7); ?>,
        backgroundColor: [
          'navy',
        ],
        borderColor: [
          'navy',
        ],
        borderWidth: 1
      },{
       
        label: 'Środki Czystości',
        data: <?php echo json_encode($purchaseVolumeArray8); ?>,
        backgroundColor: [
          'lawngreen',
        ],
        borderColor: [
          'lawngreen',
        ],
        borderWidth: 1
      },{
        label: 'Kosmetyki',
        data: <?php echo json_encode($purchaseVolumeArray9); ?>,
        backgroundColor: [
          'aqua',
        ],
        borderColor: [
          '#aqua',
        ],
        borderWidth: 1
      },{
        label: 'Przyprawy',
        data: <?php echo json_encode($purchaseVolumeArray10); ?>,
        backgroundColor: [
          'blueviolet',
        ],
        borderColor: [
          'blueviolet',
        ],
        borderWidth: 1
      },{
       
        label: 'Soki i Napoje',
        data: <?php echo json_encode($purchaseVolumeArray11); ?>,
        backgroundColor: [
          'teal',
        ],
        borderColor: [
          'teal',
        ],
        borderWidth: 1
      },{
        label: 'Kawa i herbata',
        data: <?php echo json_encode($purchaseVolumeArray12); ?>,
        backgroundColor: [
          'darkmagenta',
        ],
        borderColor: [
          'darkmagenta',
        ],
        borderWidth: 1
      },
      {
        label: 'Artykuły Tytoniowe',
        data: <?php echo json_encode($purchaseVolumeArray13); ?>,
        backgroundColor: [
          'black',
        ],
        borderColor: [
          'black',
        ],
        borderWidth: 1
      },{
        label: 'Przetwory Mięsne',
        data: <?php echo json_encode($purchaseVolumeArray14); ?>,
        backgroundColor: [
          'fuchsia',
        ],
        borderColor: [
          'fuchsia',
        ],
        borderWidth: 1
      },{
       
        label: 'Przetwory Rybne',
        data: <?php echo json_encode($purchaseVolumeArray15); ?>,
        backgroundColor: [
          'gold',
        ],
        borderColor: [
          'gold',
        ],
        borderWidth: 1
      },{
       
       label: 'Przetwory Warzywne i Owocowe',
       data: <?php echo json_encode($purchaseVolumeArray16); ?>,
       backgroundColor: [
         'indigo',
       ],
       borderColor: [
         'indigo',
       ],
       borderWidth: 1
     }

    ]
    


      },
      options: {
        responsive: true, 
      maintainAspectRatio: false,
        scales: {
            x:{
                min:'2023-04-01',
                max:'2023-04-31',
                type:'time',
                time:{
                    unit:'day'
                }
            },
          y: {
            beginAtZero: true
          }
        }
      },

    }


    const config4 = {
      type: 'line',
      data : {
      labels: dateChartJS4,
      datasets: [{
        label: 'Alkohol',
        data: <?php echo json_encode($purchasePriceArray1); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Nabiał',
        data: <?php echo json_encode($purchasePriceArray2); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },{
       
        label: 'Słodycze',
        data: <?php echo json_encode($purchasePriceArray3); ?>,
        backgroundColor: [
          'red',
        ],
        borderColor: [
          'red',
        ],
        borderWidth: 1
      },{
        label: 'Przekąski',
        data: <?php echo json_encode($purchasePriceArray4); ?>,
        backgroundColor: [
          'yellow',
        ],
        borderColor: [
          'yellow',
        ],
        borderWidth: 1
      },{
        label: 'Owoce',
        data: <?php echo json_encode($purchasePriceArray5); ?>,
        backgroundColor: [
          'orangered',
        ],
        borderColor: [
          'orangered',
        ],
        borderWidth: 1
      },{
       
        label: 'Warzywa',
        data: <?php echo json_encode($purchasePriceArray6); ?>,
        backgroundColor: [
          'brown',
        ],
        borderColor: [
          'brown',
        ],
        borderWidth: 1
      },
      {

        label: 'Pieczywo',
        data: <?php echo json_encode($purchasePriceArray7); ?>,
        backgroundColor: [
          'navy',
        ],
        borderColor: [
          'navy',
        ],
        borderWidth: 1
      }
      ,{
       
        label: 'Środki Czystości',
        data: <?php echo json_encode($purchasePriceArray8); ?>,
        backgroundColor: [
          'lawngreen',
        ],
        borderColor: [
          'lawngreen',
        ],
        borderWidth: 1
      },{
        label: 'Kosmetyki',
        data: <?php echo json_encode($purchasePriceArray9); ?>,
        backgroundColor: [
          'aqua',
        ],
        borderColor: [
          'aqua',
        ],
        borderWidth: 1
      },{
        label: 'Przyprawy',
        data: <?php echo json_encode($purchasePriceArray10); ?>,
        backgroundColor: [
          'blueviolet',
        ],
        borderColor: [
          'blueviolet',
        ],
        borderWidth: 1
      },{
       
        label: 'Soki i Napoje',
        data: <?php echo json_encode($purchasePriceArray11); ?>,
        backgroundColor: [
          'teal',
        ],
        borderColor: [
          'teal',
        ],
        borderWidth: 1
      },{
        label: 'Kawa i herbata',
        data: <?php echo json_encode($purchasePriceArray12); ?>,
        backgroundColor: [
          'darkmagenta',
        ],
        borderColor: [
          'darkmagenta',
        ],
        borderWidth: 1
      },{
        label: 'Artykuły Tytoniowe',
        data: <?php echo json_encode($purchasePriceArray13); ?>,
        backgroundColor: [
          'black',
        ],
        borderColor: [
          'black',
        ],
        borderWidth: 1
      },{
        label: 'Przetwory Mięsne',
        data: <?php echo json_encode($purchasePriceArray14); ?>,
        backgroundColor: [
          'fuchsia',
        ],
        borderColor: [
          'fuchsia',
        ],
        borderWidth: 1
      },{
       
        label: 'Przetwory Rybne',
        data: <?php echo json_encode($purchasePriceArray15); ?>,
        backgroundColor: [
          'gold',
        ],
        borderColor: [
          'gold',
        ],
        borderWidth: 1
      },{
       
       label: 'Przetwory Warzywne i Owocowe',
       data: <?php echo json_encode($purchasePriceArray16); ?>,
       backgroundColor: [
         'indigo',
       ],
       borderColor: [
         'indigo',
       ],
       borderWidth: 1
     },
      ]},
      options: {
        responsive: true,
      maintainAspectRatio: false,
        scales: {
            x:{
                min:'2023-04-01',
                max:'2023-04-31',
                type:'time',
                time:{
                    unit:'day'
                }
            },
          y: {
            beginAtZero: true
          }
        }
      },

    }


    const purchaseAmountChart = new Chart(
      document.getElementById('purchaseAmountChart'),
      config3
    );
    const purchasePaymentChart = new Chart(
      document.getElementById('purchasePaymentChart'),
      config4
    );

    function startDateFilter3(date){
        const startDate = new Date(date.value)
        purchaseAmountChart.config.options.scales.x.min=startDate.setHours(0,0,0,0)
        purchaseAmountChart.update();
    }
    function endDateFilter3(date){
        const endDate = new Date(date.value)
        purchaseAmountChart.config.options.scales.x.max=endDate.setHours(0,0,0,0)
        purchaseAmountChart.update();
    }
    function startDateFilter4(date){
        const startDate2 = new Date(date.value)
        purchasePaymentChart.config.options.scales.x.min=startDate2.setHours(0,0,0,0)
        purchasePaymentChart.update();
    }
    function endDateFilter4(date){
        const endDate2 = new Date(date.value)
        purchasePaymentChart.config.options.scales.x.max=endDate2.setHours(0,0,0,0)
        purchasePaymentChart.update();
    }








</script>
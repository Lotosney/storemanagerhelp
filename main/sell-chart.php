<?php
$query1 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`)
 AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
 WHERE `product_type` = 'Alkohol' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query2 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`)
 AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold` 
 WHERE `product_type` = 'Nabiał' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query3 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`)
 AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold` 
  WHERE `product_type` = 'Słodycze' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query4 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold` 
 WHERE `product_type` = 'Przekąski' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query5 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Owoce' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query6 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Warzywa' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query7 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Pieczywo' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query8 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Środki Czystości' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query9 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Kosmetyki' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query10 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Przyprawy' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query11 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Soki i Napoje' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query12 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Kawa i Herbata' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query13 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Artykuły Tytoniowe' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query14 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Przetwory Mięsne' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query15 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Przetwory Rybne' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
$query16 = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold`  
WHERE `product_type` = 'Przetwory Warzywne i Owocowe' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");
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
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray1[]= $row["revenue"];
    $volumeArray1[]= $row["summed_amount"];
    
}
while ($row = $query2->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray2[]= $row["revenue"];
    $volumeArray2[]= $row["summed_amount"];
    
}
while ($row = $query3->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray3[]= $row["revenue"];
    $volumeArray3[]= $row["summed_amount"];
    
}
while ($row = $query4->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray4[]= $row["revenue"];
    $volumeArray4[]= $row["summed_amount"];
    
}
while ($row = $query5->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray5[]= $row["revenue"];
    $volumeArray5[]= $row["summed_amount"];
    
}
while ($row = $query6->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray6[]= $row["revenue"];
    $volumeArray6[]= $row["summed_amount"];
    
}
while ($row = $query7->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray7[]= $row["revenue"];
    $volumeArray7[]= $row["summed_amount"];
    
}
while ($row = $query8->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray8[]= $row["revenue"];
    $volumeArray8[]= $row["summed_amount"];
    
}
while ($row = $query9->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray9[]= $row["revenue"];
    $volumeArray9[]= $row["summed_amount"];
    
}
while ($row = $query10->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray10[]= $row["revenue"];
    $volumeArray10[]= $row["summed_amount"];
    
}
while ($row = $query11->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray11[]= $row["revenue"];
    $volumeArray11[]= $row["summed_amount"];
    
}
while ($row = $query12->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray12[]= $row["revenue"];
    $volumeArray12[]= $row["summed_amount"];
    
}
while ($row = $query13->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray13[]= $row["revenue"];
    $volumeArray13[]= $row["summed_amount"];
    
}
while ($row = $query14->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray14[]= $row["revenue"];
    $volumeArray14[]= $row["summed_amount"];
    
}
while ($row = $query15->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray15[]= $row["revenue"];
    $volumeArray15[]= $row["summed_amount"];
    
}
while ($row = $query16->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray16[]= $row["revenue"];
    $volumeArray16[]= $row["summed_amount"];
    
}
?>
<script>
    const dateArrayJS = <?php echo json_encode($dateArray); ?>; 

    
    const dateChartJS = dateArrayJS.map((day,index)=>{
        let dayjs =new Date(day);
        return dayjs.setHours(0, 0,0,0)
    })


    const data = {
      labels: dateChartJS,
      datasets: [{
        label: 'Alkohol',
        data: <?php echo json_encode($volumeArray1); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Nabiał',
        data: <?php echo json_encode($volumeArray2); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },{
       
        label: 'Słodycze',
        data: <?php echo json_encode($volumeArray3); ?>,
        backgroundColor: [
          'red',
        ],
        borderColor: [
          'red',
        ],
        borderWidth: 1
      },{
        label: 'Przekąski',
        data: <?php echo json_encode($volumeArray4); ?>,
        backgroundColor: [
          'yellow',
        ],
        borderColor: [
          'yellow',
        ],
        borderWidth: 1
      },{
        label: 'Owoce',
        data: <?php echo json_encode($volumeArray5); ?>,
        backgroundColor: [
          'orangered',
        ],
        borderColor: [
          'orangered',
        ],
        borderWidth: 1
      },{
       
        label: 'Warzywa',
        data: <?php echo json_encode($volumeArray6); ?>,
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
        data: <?php echo json_encode($volumeArray7); ?>,
        backgroundColor: [
          'navy',
        ],
        borderColor: [
          'navy',
        ],
        borderWidth: 1
      },{
       
        label: 'Środki Czystości',
        data: <?php echo json_encode($volumeArray8); ?>,
        backgroundColor: [
          'lawngreen',
        ],
        borderColor: [
          'lawngreen',
        ],
        borderWidth: 1
      },{
        label: 'Kosmetyki',
        data: <?php echo json_encode($volumeArray9); ?>,
        backgroundColor: [
          'aqua',
        ],
        borderColor: [
          '#aqua',
        ],
        borderWidth: 1
      },{
        label: 'Przyprawy',
        data: <?php echo json_encode($volumeArray10); ?>,
        backgroundColor: [
          'blueviolet',
        ],
        borderColor: [
          'blueviolet',
        ],
        borderWidth: 1
      },{
       
        label: 'Soki i Napoje',
        data: <?php echo json_encode($volumeArray11); ?>,
        backgroundColor: [
          'teal',
        ],
        borderColor: [
          'teal',
        ],
        borderWidth: 1
      },{
        label: 'Kawa i herbata',
        data: <?php echo json_encode($volumeArray12); ?>,
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
        data: <?php echo json_encode($volumeArray13); ?>,
        backgroundColor: [
          'black',
        ],
        borderColor: [
          'black',
        ],
        borderWidth: 1
      },{
        label: 'Przetwory Mięsne',
        data: <?php echo json_encode($volumeArray14); ?>,
        backgroundColor: [
          'fuchsia',
        ],
        borderColor: [
          'fuchsia',
        ],
        borderWidth: 1
      },{
       
        label: 'Przetwory Rybne',
        data: <?php echo json_encode($volumeArray15); ?>,
        backgroundColor: [
          'gold',
        ],
        borderColor: [
          'gold',
        ],
        borderWidth: 1
      },{
       
       label: 'Przetwory Warzywne i Owocowe',
       data: <?php echo json_encode($volumeArray16); ?>,
       backgroundColor: [
         'indigo',
       ],
       borderColor: [
         'indigo',
       ],
       borderWidth: 1
     }

    ]
    };
  
    const config = {
      type: 'line',
      data,
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

    const config2 = {
      type: 'line',
      data : {
      labels: dateChartJS,
      datasets: [{
        label: 'Alkohol',
        data: <?php echo json_encode($priceArray1); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Nabiał',
        data: <?php echo json_encode($priceArray2); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },{
       
        label: 'Słodycze',
        data: <?php echo json_encode($priceArray3); ?>,
        backgroundColor: [
          'red',
        ],
        borderColor: [
          'red',
        ],
        borderWidth: 1
      },{
        label: 'Przekąski',
        data: <?php echo json_encode($priceArray4); ?>,
        backgroundColor: [
          'yellow',
        ],
        borderColor: [
          'yellow',
        ],
        borderWidth: 1
      },{
        label: 'Owoce',
        data: <?php echo json_encode($priceArray5); ?>,
        backgroundColor: [
          'orangered',
        ],
        borderColor: [
          'orangered',
        ],
        borderWidth: 1
      },{
       
        label: 'Warzywa',
        data: <?php echo json_encode($priceArray6); ?>,
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
        data: <?php echo json_encode($priceArray7); ?>,
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
        data: <?php echo json_encode($priceArray8); ?>,
        backgroundColor: [
          'lawngreen',
        ],
        borderColor: [
          'lawngreen',
        ],
        borderWidth: 1
      },{
        label: 'Kosmetyki',
        data: <?php echo json_encode($priceArray9); ?>,
        backgroundColor: [
          'aqua',
        ],
        borderColor: [
          'aqua',
        ],
        borderWidth: 1
      },{
        label: 'Przyprawy',
        data: <?php echo json_encode($priceArray10); ?>,
        backgroundColor: [
          'blueviolet',
        ],
        borderColor: [
          'blueviolet',
        ],
        borderWidth: 1
      },{
       
        label: 'Soki i Napoje',
        data: <?php echo json_encode($priceArray11); ?>,
        backgroundColor: [
          'teal',
        ],
        borderColor: [
          'teal',
        ],
        borderWidth: 1
      },{
        label: 'Kawa i herbata',
        data: <?php echo json_encode($priceArray12); ?>,
        backgroundColor: [
          'darkmagenta',
        ],
        borderColor: [
          'darkmagenta',
        ],
        borderWidth: 1
      },{
        label: 'Artykuły Tytoniowe',
        data: <?php echo json_encode($priceArray13); ?>,
        backgroundColor: [
          'black',
        ],
        borderColor: [
          'black',
        ],
        borderWidth: 1
      },{
        label: 'Przetwory Mięsne',
        data: <?php echo json_encode($priceArray14); ?>,
        backgroundColor: [
          'fuchsia',
        ],
        borderColor: [
          'fuchsia',
        ],
        borderWidth: 1
      },{
       
        label: 'Przetwory Rybne',
        data: <?php echo json_encode($priceArray15); ?>,
        backgroundColor: [
          'gold',
        ],
        borderColor: [
          'gold',
        ],
        borderWidth: 1
      },{
       
       label: 'Przetwory Warzywne i Owocowe',
       data: <?php echo json_encode($priceArray16); ?>,
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


    const salesAmountChart = new Chart(
      document.getElementById('salesAmountChart'),
      config
    );
    const salesIncomeChart = new Chart(
      document.getElementById('salesIncomeChart'),
      config2
    );


    function startDateFilter(date){
        const startDate = new Date(date.value)
        salesAmountChart.config.options.scales.x.min=startDate.setHours(0,0,0,0)
        salesAmountChart.update();
    }
    function endDateFilter(date){
        const endDate = new Date(date.value)
        salesAmountChart.config.options.scales.x.max=endDate.setHours(0,0,0,0)
        salesAmountChart.update();
    }
    function startDateFilter2(date){
        const startDate2 = new Date(date.value)
        salesIncomeChart.config.options.scales.x.min=startDate2.setHours(0,0,0,0)
        salesIncomeChart.update();
    }
    function endDateFilter2(date){
        const endDate2 = new Date(date.value)
        salesIncomeChart.config.options.scales.x.max=endDate2.setHours(0,0,0,0)
        salesIncomeChart.update();
    }
</script>
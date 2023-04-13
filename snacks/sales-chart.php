<?php

$query = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, SUM(`product_amount`*`product_retail_price`) 
AS `retailed`, `sell_date`, SUM(`product_amount` * `final_price`) AS `revenue` FROM `products_sold` 
 WHERE `product_type` = 'Przekąski' AND `store_email` =  '" . $email . "' GROUP BY `sell_date`  ");

$query->execute();
while ($row = $query->fetch()) {
    $dateArray[]= $row["sell_date"];
    $retailArray[]=$row["retailed"];
    $priceArray[]= $row["revenue"];
    $volumeArray[]= $row["summed_amount"];
    
}

?>
<script>
    const dateArrayJS = <?php echo json_encode($dateArray); ?>; 
    const volumeArrayJS = <?php echo json_encode($volumeArray); ?>;
    
    const dateChartJS = dateArrayJS.map((day,index)=>{
        let dayjs =new Date(day);
        return dayjs.setHours(0, 0,0,0)
    })


    const data = {
      labels: dateChartJS,
      datasets: [{
        label: 'Kwota bez VAT',
        data: <?php echo json_encode($priceArray); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Kwota z VAT',
        data: <?php echo json_encode($retailArray); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },{
       
        label: 'Ilość sprzedanego produktu',
        data: <?php echo json_encode($volumeArray); ?>,
        backgroundColor: [
          'red',
        ],
        borderColor: [
          'red',
        ],
        borderWidth: 1
      },

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




    const salesChart = new Chart(
      document.getElementById('salesChart'),
      config
    );



    function startDateFilter(date){
        const startDate = new Date(date.value)
        salesChart.config.options.scales.x.min=startDate.setHours(0,0,0,0)
        salesChart.update();
    }
    function endDateFilter(date){
        const endDate = new Date(date.value)

        salesChart.config.options.scales.x.max=endDate.setHours(0,0,0,0)
        salesChart.update();
    }
</script>
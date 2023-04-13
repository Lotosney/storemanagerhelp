<?php

$query = $pdo->prepare("SELECT  SUM(`product_amount`) AS `summed_amount`, `purchase_time`, SUM(`product_amount` * `product_wholesale_price`)
 AS `payment` FROM `products`  WHERE `product_type` = 'Kosmetyki' AND `store_email` =  '" . $email . "' GROUP BY `purchase_time`  ");

$query->execute();
while ($row = $query->fetch()) {
    $purchase[] = $row["purchase_time"];
    $paymentArray[] = $row["payment"];
    $purchaseAmountArray[] = $row["summed_amount"];
}

?>
<script>
    const purchaseAmountArrayJS = <?php echo json_encode($purchaseAmountArray); ?>;
    const purchaseDateArrayJS = <?php echo json_encode($purchase); ?>;
    const purchaseDateChartJS = purchaseDateArrayJS.map((day, index) => {
        let dayjs = new Date(day);
        return dayjs.setHours(0, 0, 0, 0)
    })
  

console.log(purchaseDateArrayJS)
    const config2 = {
      type: 'line',
      data:{      labels: purchaseDateChartJS,
      datasets: [{
        label: 'Ilość zakupionego produktu',
        data: <?php echo json_encode($purchaseAmountArray); ?>,
        backgroundColor: [
          'green',
        ],
        borderColor: [
          '#4CAF50',
        ],
        borderWidth: 1
      },{
        label: 'Poniesione Koszty w PLN',
        data: <?php echo json_encode($paymentArray); ?>,
        backgroundColor: [
          'blue',
        ],
        borderColor: [
          'blue',
        ],
        borderWidth: 1
      },

    ]},
      options: {
        font: {
                        size: 14
                    },
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
    const purchaseChart = new Chart(
      document.getElementById('purchaseChart'),
      config2
    );
    function startDateFilter2(date) {
        const startDate2 = new Date(date.value)
        purchaseChart.config.options.scales.x.min = startDate2.setHours(0, 0, 0, 0)
        purchaseChart.update();
    }

    function endDateFilter2(date) {
        const endDate2 = new Date(date.value)

        purchaseChart.config.options.scales.x.max = endDate2.setHours(0, 0, 0, 0)
        purchaseChart.update();
    }
</script>
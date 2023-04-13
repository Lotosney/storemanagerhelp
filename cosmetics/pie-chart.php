<?php $query = $pdo->prepare("SELECT  `product_brand`, `product_amount` FROM `total_products` 
 WHERE `product_type` = 'Kosmetyki' AND `store_email` =  '" . $email . "' Group BY `product_brand` ");
$query->execute();
while ($row = $query->fetch()) {
  $productNameArray[] = $row['product_brand'];
  $amountArray[] = $row['product_amount'];
}

?>
<script>
  const pieChart = document.getElementById('myPieChart');

  const products = <?php echo json_encode($productNameArray); ?>;
  const amount = <?php echo json_encode($amountArray); ?>;

  Chart.defaults.font.size = 25;
  Chart.defaults.color = 'black';
  new Chart(pieChart, {
    type: 'pie',
    data: {
      labels: products,
      datasets: [{
          label: 'Ilość',
          data: amount,
     
          backgroundColor: [
            'red', 'blue', 'cyan', 'yellow', 'purple', 'blue', 'salmon'
          ],
          

          borderWidth: 2,
          borderColor:'black'

        }


      ]
    },
    options: {
      scales: {

      },

      plugins: {
        tooltip: {
          enabled: true
        },
        datalabels: {
          formatter: (value, context) => {
          const dataPoints = context.chart.data.datasets[0].data;
          const totalValue = dataPoints.reduce((a,b) => Number(a) + Number(b), 0);
          const precentageValue =(value / totalValue *100).toFixed(1);
        return  ` ${precentageValue}%`;
      }
    }
    }

  },
  plugins: [ChartDataLabels]
  }
  );
  
</script>
   <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              


              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Available Stock</p>
                    <h5 class="font-weight-bolder text-success" style="font-size: 18px;">
<?php
$sum_stock = mysqli_query($con,"SELECT SUM(remaining) AS sum FROM green_beans WHERE processing_status='complete'");
$stocks = mysqli_fetch_array($sum_stock);

echo(number_format($stocks['sum'],2));

?> Kgs

                      
                    </h5>
                    <p class="mb-0">
                      
                      Green Beans
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Parchment</p>
                    <h5 class="font-weight-bolder text-warning"  style="font-size: 18px;">
                    
<?php
$parch_stok=mysqli_query($con,"SELECT SUM(remaining) as parch_remaining FROM parchment WHERE purchase_status='active'");
$sun_parch = mysqli_fetch_array($parch_stok);
echo(number_format($sun_parch['parch_remaining'],2));
?> Kgs
                      
                    </h5>
                    <p class="mb-0">
                      
                      Available Stock
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">All Clients</p>
                    <h5 class="font-weight-bolder text-primary" style="font-size:18px;">
                      
<?php
$gt_clients = mysqli_query($con,"SELECT * FROM customers WHERE  customer_status='active'");
$sum_clients = mysqli_num_rows($gt_clients);
echo(number_format($sum_clients));
?>

                    </h5>
                    <p class="mb-0">
                      Non Suspended
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-uppercase font-weight-bold">All Suppliers</p>
                    <h5 class="font-weight-bolder text-info" style="font-size:18px;">
                      <?php
$gt_sups = mysqli_query($con,"SELECT * FROM suppliers WHERE  supplier_status='active'");
$sum_sups = mysqli_num_rows($gt_sups);
echo(number_format($sum_sups));
?>
                    </h5>
                    <p class="mb-0">
                      Non Suspended
                    </p>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                    <i class="fa fa-truck-loading text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>














      <div class="row mt-4 mb-4 ">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Sales overview (Last One Month) <a target="_blank" href="charts.php" style="float:right;" class="btn bg-gradient-primary">  Full Report &nbsp;&nbsp; <i class="fa fa-arrow-right"></i></a></h6>
               
            </div>
            <div class="card-body  p-3" style="height:450px">
              <div class="chart">
                
<div id="chartContainer" style="height: 100%; width: 100%;"></div>
                <?php

$period="1";
$chart = "doughnut";
$request = $domain."core/sales-by-category.php?sales-by-category";
 

$ch = curl_init();
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch,CURLOPT_URL,$request);
$connect = curl_exec($ch);


//echo($connect);
$retro = json_decode($connect);

/*echo "<pre>";
print_r($retro);
echo "</pre>";
*/
$dataPoints=$retro;
?>


<!------by Consumption----->


<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light3",
  animationEnabled: true,

  data: [{
    type: "<?php echo($chart);?>",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0\" Ugx\"",
    showInLegend: true,
    legendText: "{label}",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>



              </div>
            </div>
          </div>
        </div>
        
      </div>
      
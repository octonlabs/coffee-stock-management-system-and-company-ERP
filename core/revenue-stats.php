



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
      
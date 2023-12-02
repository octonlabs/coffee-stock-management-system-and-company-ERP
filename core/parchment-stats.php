



      <div class="row mt-4 mb-4 ">
        <div class="col-lg-12 mb-lg-0 mb-4">
          <div class="card z-index-2">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Parchment overview (Last One Month)</h6>
               
            </div>
            <div class="card-body  p-3" style="height:450px">
              <div class="chart">
                
<div id="chartContainer" style="height: 100%; width: 100%;"></div>
                <?php

$period="1";
$chart = "doughnut";

$ct_active = mysqli_query($con,"SELECT SUM(quantity) as total_stock FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$ct_actve = mysqli_fetch_array($ct_active);

$ct_suspended = mysqli_query($con,"SELECT SUM(remaining) as remaining_stock FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$ct_sus = mysqli_fetch_array($ct_suspended);

$avail = number_format(($ct_sus['remaining_stock']),2);
$total_stock = number_format(($ct_actve['total_stock']),2);


$total = $total_stock+$avail;
$active=number_format(($avail/$total)*100,2);

$processed= number_format(($total_stock/$total)*100,2);

$dataPoints = array( 
 
  array("label"=>"Stock Purchased", "symbol" => "Stock Purchased (".$total_stock." Kgs)","y"=>$processed),
  array("label"=>"Available Stock", "symbol" => "Available Stock (".$avail." Kgs)","y"=>$active),
 
 
);
?>




<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light3",
  animationEnabled: true,

  data: [{
    type: "<?php echo($chart);?>",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0.00\"%\"",
    showInLegend: true,
    legendText: "{label} : {y}",
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
      
<?php include('core/dash-header.php');
//<div style="width: 170px; white-space: normal;">
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Manage Organisations</h6>
             
            </div>
            <div class="card-body p-3">
   


<?php

/*
$gt_data = "SELECT * FROM coffee_grades WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 12 MONTH) ORDER BY created_at";

*/



$dataPoints = array( 
  array("label"=>"Oxygen", "symbol" => "O","y"=>46.6),
  array("label"=>"Silicon", "symbol" => "Si","y"=>27.7),
  array("label"=>"Aluminium", "symbol" => "Al","y"=>13.9),
  array("label"=>"Iron", "symbol" => "Fe","y"=>5),
  array("label"=>"Calcium", "symbol" => "Ca","y"=>3.6),
  array("label"=>"Sodium", "symbol" => "Na","y"=>2.6),
  array("label"=>"Magnesium", "symbol" => "Mg","y"=>2.1),
  array("label"=>"Others", "symbol" => "Others","y"=>1.5),
 
)
 
?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
  theme: "light2",
  animationEnabled: true,
  title: {
    //text: "Average Composition of Magma"
  },
  data: [{
    type: "doughnut",
    indexLabel: "{symbol} - {y}",
    yValueFormatString: "#,##0.0\"%\"",
    showInLegend: true,
    legendText: "{label} : {y}",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();
 
}
</script>

<div id="chartContainer" style="height: 400px; width: 100%;"></div>



            </div>
          </div>
        </div>
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
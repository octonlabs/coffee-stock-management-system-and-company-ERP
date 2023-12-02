<?php include('core/dash-header.php');
//<div style="width: 170px; white-space: normal;">
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="min-height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Select Sector</h6>
             
            </div>
            <div class="card-body p-3">
           <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
  ?>
 
<div class="col-lg-12">
  <div class="row g-2">
    






<!------start menu-------------------->


<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('supplies-report.php?time=6&status=expenditure&chart=doughnut')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-box-open text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Supplies Report</small>
  </div>

</center>

</div>





<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('products-report.php?time=6&status=sales&chart=doughnut')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-boxes text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Products Report</small>
  </div>

</center>

</div>




<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('suppliers-charts.php?time=6&status=expenditure&chart=column')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-truck-loading text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Suppliers Report</small>
  </div>

</center>

</div>








    
<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('customers-report.php?time=6&status=sales&chart=pie')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-user-friends text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Customer Report</small>
  </div>

</center>

</div>




    
<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('stock-charts.php?time=6&status=available-grades-stocks&chart=doughnut')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-tachometer-alt text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Stock Report</small>
  </div>

</center>

</div>





<div class="card m-3 border-warning shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;" onclick="window.open('transactions-report.php?time=6&status=income-vs-expenditure&chart=doughnut')">
  
<center>
  
  <div style="width:80px; height: 80px; border-radius:100%" class="shadow-sm">
    <i class="fa fa-exchange-alt text-warning text-center mt-4" style="font-size:30px;"></i>
  </div>
  <br>
  <div class="shadow-sm text-warning text-capitalize" style="width:60%;">
    <small>Transaction Report</small>
  </div>

</center>

</div>





<!----------//end menu----------------------->



  </div>
</div>

            </div>
<?php } else {?>



<center>

<div class="card m-3 border-warning shadow col-md-6" style="height:400px;border:1px solid crimson;cursor: pointer;" onclick="window.open('supplies-report.php?time=6&status=expenditure&chart=doughnut')">
  
<center>
  
  <div style="width:250px; height: 250px; border-radius:100%" class="shadow-sm bg-gradient-danger mt-1">
    <b style="font-size:140px; color: white;">
      !
    </b>
  </div>
  <br>
  <div class="shadow-sm text-white bg-gradient-danger text-capitalize" style="width:60%; border-radius: 12px;">
    <small>Access Denied</small>
  </div>

</center>

</div>
</center>




<?php } ?>


          </div>
        </div>
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
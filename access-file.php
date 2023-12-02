<?php include('core/dash-header.php');
//<div style="width: 170px; white-space: normal;">
if (($_SESSION['authority']=='superadmin') || ($_SESSION['variable']=='1')) {
  // authorized to operate
} else {
  // access denied
}
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Manage Organisations</h6>
             
            </div>
            <div class="card-body p-3">
   

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




            </div>
          </div>
        </div>
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
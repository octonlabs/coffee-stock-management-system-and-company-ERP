<?php include('core/dash-header.php'); 
$org_id=preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['staff-record']));
$gt_org = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$org_id'");
$row=mysqli_fetch_array($gt_org);
 ?>





    <div class="container-fluid py-4">







      <div class="row">
        <div  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit Staff</h6>
                      <?php
             if ($error) {
               // code...
              ?>
<div class="btn col-md-12  bg-gradient-danger btn-block"><?php echo$error;?></div>

              <?php
             }

             elseif ($message)
             {
              ?>
<div  class="btn col-md-12 bg-gradient-success btn-block"><?php echo$message;?></div>
              <?php
             }
             ?>
            </div>
            <div class="card-body p-3">
              


       <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  ?>



<form action="" method="post" enctype="multipart/form-data">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Staff Name" value="<?php echo(htmlentities($row['staffname']));?>" name="staffname">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Staff Position" value="<?php echo(htmlentities($row['staffposition']));?>"  name="staffposition">
  <br>
    <input type="text" value="<?php echo(htmlentities($row['staffallowances']));?>"  required class="form-control rounded-pill" placeholder="Total Monthly Allowances" name="staffallowances">
  <br>
    <input type="text"  value="<?php echo(htmlentities($row['staffsalary']));?>"  required class="form-control rounded-pill" placeholder="Total Monthly Salary" name="staffsalary">
  <br>
<select class="form-control rounded-pill" name="staff_status">
  <option <?php if ($row['staff_status']=='active') {
    echo "selected";
  }?> value="active" >Active</option>
  <option <?php if ($row['staff_status']!=='active') {
    echo "selected";
  }?> value="fired">Fired</option>
</select>
  <br>

  <center><small>Staff Image</small></center>
  <input type="file"  class="form-control rounded-pill" accept="image/*" name="staffimage">
    <input type="hidden" required class="form-control rounded-pill" value="<?php echo(htmlentities($row['staffimage']));?>" name="staffimageold">
  <br>
  <center><small>Staff CV</small></center>
  <input type="file"  class="form-control rounded-pill"  name="staffcv">
  <input type="hidden" required class="form-control rounded-pill" value="<?php echo(htmlentities($row['staffcv']));?>" name="staffcvold">
<br>
<input type="hidden" value="<?php echo(htmlentities($org_id));?>" name="staff_id">
<textarea class="form-control" style="height:250px;" name="otherinfo" placeholder="Other Staff Info e.g Phone,Email,Address E.t.c"><?php echo(htmlentities($row['otherinfo']));?></textarea>

  <br>
  <center>
    <button name="update_staff" class="btn bg-gradient-danger" style="width:68%;"> Update Staff </button>
  </center>
</form>



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
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
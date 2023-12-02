<?php include('core/dash-header.php'); 
$org_id=preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['coffeegrade']));
$gt_grade = mysqli_query($con,"SELECT * FROM coffee_grades WHERE id='$org_id'");
$grade = mysqli_fetch_array($gt_grade);
?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit Coffee Grade</h6>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate
  ?>



<center>
<small style="color: crimson;">This May Affect Stock Information All Over The Database</small>
<form action="" method="post">
  <br>
  <input type="text" value="<?php echo(htmlentities($grade['coffeegrade']));?>" required class="form-control rounded-pill" placeholder="Coffee Grade" name="coffeegrade">
  <br>
  <input type="hidden" value="<?php echo(htmlentities($grade['id']));?>" name="grade_id">
  <input type="number" value="<?php echo(htmlentities($grade['alertlevel']));?>" required name="alertlevel" class="form-control rounded-pill" placeholder="Alert if Stock falls below (KGz)">
  <br>
  <button name="update_grade" class="btn bg-gradient-danger" style="width:68%;"> Update Grade </button>
</form>


</center>


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
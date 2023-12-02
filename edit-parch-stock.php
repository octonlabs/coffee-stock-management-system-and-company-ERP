<?php include('core/dash-header.php'); 




if (isset($_GET['edit-parch'])) {
  // code...



$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['edit-parch']));
$gt_patch = mysqli_query($con,"SELECT * FROM parchment WHERE id='$user_id'");
$parch = mysqli_fetch_array($gt_patch);
}


?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit Parchment</h6>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1'))) {
  // authorized to operate
  ?>


<center>

<form action="" method="post">
  <br>
  <center><small>Select Supplier</small></center>
  <select class="form-control rounded-pill" name="supplier">
<?php
$gt_pdt=mysqli_query($con,"SELECT * FROM suppliers where supplier_status='active' ORDER BY id DESC");
while ($sups=mysqli_fetch_array($gt_pdt)) {
?>
<option  <?php if ($sups['id']==($parch['supplier'])) {
    echo "selected";
  }?> 
   value="<?php echo$sups['id'];?>"><?php echo$sups['suppliername'];?></option>
<?php } ?>
</select>


 <input type="hidden" value="<?php echo($parch['id']);?>" name="parch_id">


  <br>
<input type="text" value="<?php echo(htmlentities($parch['quantity']));?>" class="form-control rounded-pill" name="quantity" placeholder="Kgs">

  <br>
<input type="text"  value="<?php echo(htmlentities($parch['unitprice']));?>"  class="form-control rounded-pill" name="unitprice" placeholder="Unit Price">


  <br>
  <center><small>Batch Number</small></center>
<input type="text" readonly class="form-control rounded-pill" name="batchnumber" placeholder="Batch Number" value="<?php echo(htmlentities($parch['batchnumber']));?>">

<br>
<center><small>Select Handler</small></center>
   <select class="form-control rounded-pill" name="handler">
<?php
$gt_grade=mysqli_query($con,"SELECT * FROM staffinformation where staff_status='active' ORDER BY id DESC");
while ($grade=mysqli_fetch_array($gt_grade)) {
?>
<option  <?php if ($grade['handler']==($parch['handler'])) {
    echo "selected";
  }?> value="<?php echo$grade['id'];?>"><?php echo$grade['staffname'];?></option>
<?php } ?>
</select>


  <br>
<textarea class="form-control" style="height:150px;" name="otherinfo" placeholder="Other Information e.g moisture content, defect grade e.t.c"><?php echo(htmlentities($parch['otherinfo']));?></textarea>

  <br>

 
  <button name="update_parchment" class="btn bg-gradient-danger" style="width:68%;"> Update Parchment Stock </button>
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
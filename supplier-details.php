<?php include('core/dash-header.php'); 

if (isset($_GET['supplier'])) {
	// code...



$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['supplier']));
$gt_supplier = mysqli_query($con,"SELECT * FROM suppliers WHERE id='$user_id'");
$supplier = mysqli_fetch_array($gt_supplier);

}
?>

  

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                
                <a href="supplier-coffee-log.php?supplier-code=<?php echo(htmlentities($supplier['id']));?>" class="btn bg-gradient-warning btn-sm ms-auto">Coffee Supply Log</a>



                <a href="supplier-log.php?supplier-code=<?php echo(htmlentities($supplier['id']));?>&type=expenditure" class="btn bg-gradient-primary btn-sm ms-auto">Transaction Log</a>
                
              </div>

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
            <div class="card-body">


                      <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate
  ?>

              <p class="text-uppercase text-sm">Supplier Information</p>
              <div class="row">
                

              

<center>

<form action="" method="post">
  <br>
  <input type="text" required class="form-control rounded-pill" value="<?php echo(htmlentities($supplier['suppliername']));?>" placeholder="Supplier Name" name="suppliername">
  <br>
  <input type="text" value="<?php echo(htmlentities($supplier['supplierphone']));?>" required name="supplierphone" class="form-control rounded-pill" placeholder="Supplier Phone">
  <br>
    <input type="text" value="<?php echo(htmlentities($supplier['supplierlocation']));?>" required name="supplierlocation" class="form-control rounded-pill" placeholder="Supplier Location">
  <br>
  <select class="form-control rounded-pill" name="supplier_status" >
    <option <?php if ($supplier['supplier_status']=='active') {
    echo "selected";
  }?> value="active">Active</option>
    <option <?php if ($supplier['supplier_status']=='suspended') {
    echo "selected";
  }?> value="suspended">Suspended</option>
  </select>
  <br>
  <select class="form-control rounded-pill" name="suppliertype">
    <?php 
    $gt_supplies=mysqli_query($con,"SELECT * FROM supplies ORDER BY id DESC");
    while ($rex=mysqli_fetch_array($gt_supplies)) {
   ?>
    <option
    <?php if ($row['suppliertype']==(htmlentities($rex['id']))) {
    echo "selected";
  }?>
   value="<?php echo(htmlentities($rex['id']));?>"><?php echo(htmlentities($rex['itemsupply'])) ?> <?php if ($rex['status']!=='active') {
    echo "(Disabled Input)";
  }?></option>
  <?php } ?>
  </select>
 <br>
 <input type="hidden" value="<?php echo(htmlentities($user_id));?>" name="supplierid">
  <textarea class="form-control" style="height:160px;" name="briefinfo" placeholder="Other Information"><?php echo(htmlentities($supplier['briefinfo']));?></textarea>
  <br>
  <button name="update_supplier" class="btn bg-gradient-danger" style="width:68%;"> Update Supplier </button>
</form>


</center>



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

















      </div>
     
    </div>










<?php include('core/dash-footer.php'); ?>
<?php include('core/dash-header.php'); 
$org_id=preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['edit-sale']));
$gt_grade = mysqli_query($con,"SELECT * FROM sales WHERE id='$org_id'");
$grade = mysqli_fetch_array($gt_grade);
?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit Sale</h6>
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
if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['managesales']=='1'))) {
  // authorized to operate
  ?>



<center>



  

<form action="" method="post">
  <br>
  <small style="text-align:center;">Customer Name</small>
<select class="form-control rounded-pill" name="customer">
  
<?php
$gt_customer = mysqli_query($con,"SELECT * FROM customers WHERE customer_status='active' ORDER BY id DESC");
while ($ro=mysqli_fetch_array($gt_customer)) {
  // code...?>
<option  <?php if ($ro['id']==($grade['customer'])) {
    echo "selected";
  }?>  value="<?php echo(htmlentities($ro['id']));?>"><?php echo(htmlentities($ro['customername']));?></option>
  <?php
}
?>
  </select>
<br>
<input type="text" readonly class="form-control rounded-pill" name="receiptnumber" placeholder="Receipt Number" value="<?php echo((htmlentities($grade['receiptnumber'])));?>">
<br>
<select class="form-control rounded-pill" name="productname">
  <?php
  $gt_pdt =mysqli_query($con,"SELECT * FROM products WHERE status='active'");
  while ($pro = mysqli_fetch_array($gt_pdt)) {
    // code...
    ?>
<option  <?php if ($pro['id']==($grade['productname'])) {
    echo "selected";
  }?>  value="<?php echo(htmlentities($pro['id']));?>"><?php echo(htmlentities($pro['itemsupply']));?></option>

  <?php } ?>

</select>
  <br>
  <small class="text-center">Select Handler</small>
  
       <select class="form-control rounded-pill" name="handler">
<?php
$gt_handler=mysqli_query($con,"SELECT * FROM staffinformation where staff_status='active' ORDER BY id DESC");
while ($handler=mysqli_fetch_array($gt_handler)) {
?>
<option  <?php if ($handler['id']==($grade['handler'])) {
    echo "selected";
  }?>  value="<?php echo$handler['id'];?>"><?php echo$handler['staffname'];?></option>
<?php } ?>
</select>
 
  <br>
 

  <input type="number" value="<?php echo(htmlentities($grade['quantity'])); ?>" required name="quantity" class="form-control rounded-pill" placeholder="Quantity">
  <br>
  <input type="number" value="<?php echo(htmlentities($grade['unitprice'])); ?>"  required name="unitprice" class="form-control rounded-pill" placeholder="Unit Price">
  <br>
   <input type="number" required name="amount"  value="<?php echo(htmlentities($grade['amount'])); ?>"  class="form-control rounded-pill" placeholder="Amount Paid">
  <br>
  <textarea class="form-control" style="height:100px;" placeholder="Other Information e.g Coffee Grade" name="otherinfo"><?php echo(htmlentities($grade['otherinfo'])); ?></textarea>
  <br>
  <button name="update_sale" class="btn bg-gradient-danger" style="width:68%;"> Update Sale </button>
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
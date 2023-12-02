<?php include('core/dash-header.php'); 

if (isset($_GET['customer'])) {
  // code...



$user_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['customer']));
$gt_supplier = mysqli_query($con,"SELECT * FROM customers WHERE id='$user_id'");
$supplier = mysqli_fetch_array($gt_supplier);

}
?>

  

    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header pb-0">
              <div class="d-flex align-items-center">
                
           

                <a href="customer-log.php?customer-code=<?php echo(htmlentities($supplier['id']));?>" class="btn bg-gradient-primary btn-sm ms-auto">Transaction Log</a>
                
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>

              <p class="text-uppercase text-sm">Customer Information</p>
              <div class="row">
                

              

<center>


<form action="" method="post">
  <br>
  <input type="text" required value="<?php echo(htmlentities($supplier['customername'])); ?>" class="form-control rounded-pill" placeholder="Customer Name" name="customername">
  <br>
  <input type="text" required value="<?php echo(htmlentities($supplier['customerphone'])); ?>"  name="customerphone" class="form-control rounded-pill" placeholder="Customer Phone">
  <br>
   <input type="text" required value="<?php echo(htmlentities($supplier['customertype'])); ?>"  name="customertype" class="form-control rounded-pill" placeholder="Customer Type e.g SuperMarket">
  <br>
    <input type="text" required value="<?php echo(htmlentities($supplier['customerlocation'])); ?>"  name="customerlocation" class="form-control rounded-pill" placeholder="Customer Location">
 
 <br>
  <select class="form-control rounded-pill" name="customer_status" >
    <option <?php if ($row['customer_status']=='active') {
    echo "selected";
  }?> value="active">Active</option>
    <option <?php if ($row['customer_status']!=='active') {
    echo "selected";
  }?> value="suspended">Suspended</option>
  </select>
  <br>
  <input type="hidden" name="customer_id" value="<?php echo(htmlentities($supplier['id'])); ?>">
  <textarea class="form-control" style="height:160px;" name="briefinfo" placeholder="Other Information"><?php echo(htmlentities($supplier['briefinfo'])); ?></textarea>
  <br>
  <button name="update_customer" class="btn bg-gradient-danger" style="width:68%;"> Update Customer </button>
</form>



</center>



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
     
    </div>










<?php include('core/dash-footer.php'); ?>
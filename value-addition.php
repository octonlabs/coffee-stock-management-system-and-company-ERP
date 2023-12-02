<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize"> Quality Lab (value addition) <button data-toggle="modal" data-target="#newProcessing" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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
            <div class="card-body p-3" style="width:100%;">
              



        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate
  ?>



 <div    class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>QTY</th>
                           <th>Batch Number</th>
                           <th>Handler</th>
                           <th>Customer</th>
                           <th>Other Info</th>
                           
                           <th>#</th>

                        </tr>
                     </thead>
                     <tbody>
 
 <?php

$gt_reqs = mysqli_query($con,"SELECT * FROM liquoring ORDER BY id DESC");
while ($request=mysqli_fetch_array($gt_reqs)) {
  // code...
  $request_status = htmlentities($request['status']);
$handle = htmlentities($request['handler']);
  $gt_handlar = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$handle'");
  $hando = mysqli_fetch_array($gt_handlar);
  $handoz = htmlentities($hando['staffname']);
  $hando_status = htmlentities($hando['staff_status']);
  $custo_id  =htmlentities($request['customer']);
  if ($custo_id!=='none') {
    // code...


  $custo = mysqli_query($con,"SELECT * FROM customers WHERE id='$custo_id'");
  $custo_data=mysqli_fetch_array($custo);
  $custo_name = htmlentities($custo_data['customername']);
  $custo_status = htmlentities($custo_data['customer_status']);
  $custo_phone = htmlentities($custo_data['customerphone']);
  $custo_address = htmlentities($custo_data['customerlocation']);
  } else {
    // code...
    $custo_dian = "internal";
  }

 ?>




<tr>

<td>
  <?php echo(number_format($request['quantity'],2));?> Kgs<br>
  <?php
  if($request_status=='approved')
{
  echo '<span class="badge badge-link bg-gradient-success">Complete</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Cancelled</span>';

}
?>
</td>
<td>
  <?php
  
$green_bean_id = htmlentities($request['green_bean_id']);
$batch_data = mysqli_query($con,"SELECT * FROM green_beans WHERE id='$green_bean_id'");
$bean_data = mysqli_fetch_array($batch_data);
$bean_grade = (htmlentities($bean_data['coffeegrade']));
$gt_gtade = mysqli_query($con,"SELECT * FROM coffee_grades WHERE id='$bean_grade'");
$grade_info = mysqli_fetch_array($gt_gtade);
$grade_name = htmlentities($grade_info['coffeegrade']);
$bean_batch = htmlentities($bean_data['batchnumber']);
  ?><?php echo($bean_batch);?> - (<?php echo$grade_name;?>)

</td>
<td>
  
   <?php echo(htmlentities($handoz));?>
    <br>
      <?php
if($hando_status=='active')
{
  echo '<span class="badge badge-link bg-gradient-success">active</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Fired</span>';

}
?>

</td>
<td>
  <b>Request Id : </b><?php
  $request_id = htmlentities($request['request_id']);
   echo $request_id; ?><br>
   <b>customer :   <?php echo(($custo_name));?>
   </b>
</td>
<td style="text-align:justify; flex-wrap: nowrap;">
  <div style="width: 170px; white-space: normal;">
  <b><?php echo(date("D d M Y H:m:sa",strtotime($request['created_at'])));?></b><br>
  
    <?php echo(htmlentities($request['otherinfo']));?>
  
  <br>
  <b><i>Last Edit : </i><?php echo(date("D d M Y H:m:sa",strtotime($request['updated_at'])));?></b><br>
 </div>
</td>
<td>


   <?php
if($request['status']=='approved')
{
  echo '<a class="btn btn-danger" href="?cancel-liquoring='. $request['id'] .'" class="text-danger">
  <small>
        <i class="fa fa-power-off"></i>
      </small>
  </a>';
  
}
else
{

  echo '<a class="btn btn-success" href="?approve-liquoring='. $request['id'] .'" class="text-success">
<small>
   <i class="fa fa-check-circle"></i>
 </small>
  </a>';

}
?>
</td>




</tr>


          <?php } ?>              
                     </tbody>
                     <tfoot>
                        <tr>
                        <th>QTY</th>
                           <th>Batch Number</th>
                           <th>Handler</th>
                           <th>Customer</th>
                           <th>Other Info</th>
                           
                           <th>#</th>

                        </tr>
                     </tfoot>
                  </table>
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
     

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate
  ?>
<!------------------newCoffeeGrade modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="newProcessing" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0" role="document">
    <div class="modal-content bg-transparent border-0">
  <div class="container  bg-white border-0 " style="border-radius:15px;">
 


<center>

<form action="" method="post">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Quantity (KGs)" name="quantity">
  <br>
<center><small>Select Customer</small></center>
<select  class="form-control rounded-pill" name="customer">
<option value="none">None</option>
<?php
$gt_customers = mysqli_query($con,"SELECT * FROM customers WHERE customer_status='active'");
while ($cust = mysqli_fetch_array($gt_customers)) {
  // code...

?>

<option value="<?php echo(htmlentities($cust['id']));?>"><?php echo(htmlentities($cust['customername']));?>  - <?php echo(htmlentities($cust['customertype']));?> - <?php echo(htmlentities($cust['customerlocation']));?></option>

<?php } ?>
</select>
<br>
<label>Request Number</label>
<input type="text" class="form-control rounded-pill text-black"  readonly name="batchnumber" value="<?php echo((rand(100,1000000)));?>">
<br>

<select  class="form-control rounded-pill" name="batches">
  
<option selected disabled>Select Batch</option>
  <?php
$gt_batches = mysqli_query($con,"SELECT * FROM green_beans WHERE remaining>0 && processing_status='complete' ORDER BY id DESC");
while ($rex=mysqli_fetch_array($gt_batches)) {
  $c_grade = htmlentities($rex['coffeegrade']);
  $coffeegradez = mysqli_query($con,"SELECT * FROM coffee_grades WHERE id='$c_grade'");
  $grade_data = mysqli_fetch_array($coffeegradez);
   ?>

<option value="<?php echo(htmlentities($rex['id'])); ?>"> <?php echo(htmlentities($rex['batchnumber'])); ?> - (Max <?php echo(number_format($rex['remaining'],2));?> Kgs) - <?php echo($grade_data['coffeegrade']);?> </option>

<?php } ?>
</select>

 
  <br>
  <center><small>Select Handler</small></center>
   <select class="form-control rounded-pill" name="handler">
<?php
$gt_grade=mysqli_query($con,"SELECT * FROM staffinformation where staff_status='active' ORDER BY id DESC");
while ($grade=mysqli_fetch_array($gt_grade)) {
?>
<option value="<?php echo$grade['id'];?>"><?php echo$grade['staffname'];?></option>
<?php } ?>
</select>


  <br>

<textarea class="form-control" style="height:150px;" name="otherinfo" placeholder="Other Information e.g Purpose"></textarea>

  <br>


  <button name="request_green_beans" class="btn bg-gradient-danger" style="width:68%;"> Request Stock </button>
</form>


</center>




 </div>

</div>
</div>
</div>





<!-------//-------------newCoffeeGrade Modal-------------------------->
<?php } ?>

</div>

<?php include('core/dash-footer.php'); ?>
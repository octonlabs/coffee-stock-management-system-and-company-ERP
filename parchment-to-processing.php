<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Parchment stock to processing <button data-toggle="modal" data-target="#newProcessing" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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
if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['processparchment']=='1'))) {
  // authorized to operate
  ?>



 <div    class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>QTY</th>
                           <th>Batch Number</th>
                           <th>Handler</th>
                           <th>Other Info</th>
                           
                           <th>#</th>

                        </tr>
                     </thead>
                     <tbody>
 
 <?php

 $gt_processing = mysqli_query($con,"SELECT * FROM processing ORDER BY id DESC");
 while ($rowz = mysqli_fetch_array($gt_processing)) {
   // code...
  $handler = htmlentities($rowz['handler']);
  $gt_handlar = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$handler'");
  $hando = mysqli_fetch_array($gt_handlar);
  $handoz = htmlentities($hando['staffname']);
  $hando_status = htmlentities($hando['staff_status']);
 ?>
<tr>
    <td>
      <?php echo(number_format($rowz['quantity'],2));?> Kgs
    </td>
          
  <td>
    <?php echo(htmlentities($rowz['batchnumber']));?>
        <br>
      <?php
if($rowz['status']=='approved')
{
  echo '<span class="badge badge-link bg-gradient-success">Approved</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Cancelled</span>';

}
?>

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
    <div style="width: 170px; white-space: normal;">
      <b><?php echo(date("D d M Y H:m:sa",strtotime($rowz['created_at'])));?></b><br>
  <?php echo(htmlentities($ret['otherinfo']));?>
  <br>
  <b><i>Last Edit : </i><?php echo(date("D d M Y H:m:sa",strtotime($rowz['updated_at'])));?></b><br>
 </div>
  </td>
          
 
        
  <td>
   

          <?php
if($rowz['status']=='approved')
{
  echo '<a class="btn btn-danger" href="?cancel-request='. $rowz['id'] .'" class="text-danger">
  <small>
        <i class="fa fa-power-off"></i>
      </small>
  </a>';
  
}
else
{

  echo '<a class="btn btn-success" href="?approve-request='. $rowz['id'] .'" class="text-success">
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
if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['processparchment']=='1'))) {
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

<select  class="form-control rounded-pill" name="batches">
  
<option selected disabled>Select Batch</option>
  <?php
$gt_batches = mysqli_query($con,"SELECT * FROM parchment WHERE remaining>0 && purchase_status='active' ORDER BY RAND()");
while ($rex=mysqli_fetch_array($gt_batches)) {
   ?>

<option value="<?php echo(htmlentities($rex['id'])); ?>"> <?php echo(htmlentities($rex['batchnumber'])); ?> - (Max <?php echo(number_format($rex['remaining'],2));?> Kgs) </option>

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

<textarea class="form-control" style="height:150px;" name="otherinfo" placeholder="Other Information"></textarea>

  <br>


  <button name="request_stock" class="btn bg-gradient-danger" style="width:68%;"> Request Stock </button>
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
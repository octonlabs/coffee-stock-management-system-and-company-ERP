<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Green Beans<button data-toggle="modal" data-target="#newGreenBeans" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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

 <div   class="table-responsive" >
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Grade</th>
                           
                           <th>#</th>
                           <th>Status</th>
                           <th>Handler</th>
                           <th>Other Info</th>
                           <th>#</th>
                           

                        </tr>
                     </thead>
                     <tbody>
 
 

 <?php


$gt_parch=mysqli_query($con,"SELECT * FROM green_beans ORDER BY id DESC");
while($ret=mysqli_fetch_array($gt_parch))
{
  $supplier_id = $ret['coffeegrade'];

  $gt_supplier=mysqli_query($con,"SELECT * FROM coffee_grades WHERE id='$supplier_id'");
  $suplyer=mysqli_fetch_array($gt_supplier);
  $handler_id = $ret['handler'];
  $gt_handler = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$handler_id'");
  $hands = mysqli_fetch_array($gt_handler);
 ?>
 
 <tr>
   
<td><?php echo(htmlentities($suplyer['coffeegrade']));?></td>

<td><b>QTY : </b><?php echo(number_format($ret['quantity'],2));?><br>
  <b>Remaining : </b><?php echo(number_format($ret['remaining'],2));?></td>
<td>

      <?php
if((htmlentities($ret['processing_status'])=='complete'))
{
  echo '<span class="badge badge-link bg-gradient-success">Processed</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Cancelled</span>';

}
?>


</td>
<td>
  <?php echo(htmlentities($hands['staffname']));?>
</td>

<td>
  <div style="width: 170px; white-space: normal;">
  <b>Batch :</b><?php echo(htmlentities($ret['batchnumber']));?><br>
  <b><?php echo(date("D d M Y H:m:sa",strtotime($ret['created_at'])));?></b><br>
  <?php echo(htmlentities($ret['otherinfo']));?>
  <br>
  <b><i>Last Edit : </i><?php echo(date("D d M Y H:m:sa",strtotime($ret['created_at'])));?></b><br>
</div>
</td>
<td>


    
<?php
if ($ret['processing_status']=='complete') {
  // code...
  ?>
     <a  class="btn btn-warning" href="?cancel-green-bean-batch=<?php echo $ret['id'];?>">
      <small>
        <i class="fa fa-power-off"></i>
      </small>
    </a>


  
<?php }
else
{ ?>
     <a class="btn btn-success" href="?enable-green-bean-batch=<?php echo $ret['id'];?>"><small>
   <i class="fa fa-check-circle"></i>
 </small></a>

 

  
<?php }
?>
</td>
 </tr>


<?php } ?>

                        
                     </tbody>
                     <tfoot>
                        <tr>
                          <th>Grade</th>
                           
                           <th>#</th>
                           <th>Status</th>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate
  ?>
<!------------------newCoffeeGrade modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="newGreenBeans" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0" role="document">
    <div class="modal-content bg-transparent border-0">
  <div class="container  bg-white border-0 " style="border-radius:15px;">
 


<center>

<form action="" method="post">
  <br>
  <center><small>Select Grade</small></center>
  <select class="form-control rounded-pill" name="coffeegrade">
<?php
$gt_pdt=mysqli_query($con,"SELECT * FROM coffee_grades ORDER BY RAND()");
while ($sups=mysqli_fetch_array($gt_pdt)) {
?>
<option value="<?php echo$sups['id'];?>"><?php echo$sups['coffeegrade'];?></option>
<?php } ?>
</select>
 


  <br>
<input type="text" class="form-control rounded-pill" name="quantity" placeholder="Kgs">

  <br>
 
  <center><small>Batch Number</small></center>
<input type="text" readonly class="form-control rounded-pill" name="batchnumber" placeholder="Batch Number" value="<?php echo((rand(1000,100000000)));?>">

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
<textarea class="form-control" style="height:150px;" name="otherinfo" placeholder="Other Information e.g 24 Bags, Export Grade,  Store Number, e.t.c"></textarea>

  <br>

 
  <button name="add_green_beans" class="btn bg-gradient-danger" style="width:68%;"> Add Green Beans Stock </button>
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
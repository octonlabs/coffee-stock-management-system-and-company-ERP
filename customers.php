<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Manage Customers <button data-toggle="modal" data-target="#newCustomers" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>



 <div  class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Phone</th>
                           <th>Location</th>
                           <th>Type</th>
                           <th>Status</th>
                           <th>#</th>
                          
                        </tr>
                     </thead>
                     <tbody>
 
 <?php


$gt_suppliers=mysqli_query($con,"SELECT * FROM customers ORDER BY id DESC");
while ($row=mysqli_fetch_array($gt_suppliers)) {


 ?>

 <tr>
   

   <td><?php echo(htmlentities($row['customername'])); ?></td>
   <td><?php echo(htmlentities($row['customerphone'])); ?></td>
   <td><?php echo(htmlentities($row['customerlocation'])); ?></td>
   <td><?php echo(htmlentities($row['customertype']));?></td>

 <td>
<?php

$supplier_status = (htmlentities($row['customer_status'])); 
if($supplier_status=='active')
{
  echo '<span class="badge badge-link bg-gradient-success">active</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Suspended</span>';

}
?>
   

 </td>
   
   <td>
    <a  class="btn btn-primary" href="customer-details.php?customer=<?php echo$row['id'];?>">
  <small>
        <i class="fa fa-pen"></i>
      </small>
      </a>


    

     
<?php
if($supplier_status=='active')
{?>
    
     <a  class="btn btn-warning"  href="?suspend-customer=<?php echo$row['id'];?>">
      <small>
        <i class="fa fa-power-off"></i>
      </small>
    </a>


    
 <?php 
}
else
{
  ?>

     <a class="btn btn-success" href="?activate-customer=<?php echo$row['id'];?>"><small>
   <i class="fa fa-check-circle"></i>
 </small></a>

 



  <?php
}

?></td>
 </tr>
 
<?php } ?>

                        
                     </tbody>
                     <tfoot>
                        <tr>
                                <th>Name</th>
                           <th>Phone</th>
                           <th>Location</th>
                           <th>Type</th>
                           <th>Status</th>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>

<!------------------newCoffeeGrade modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="newCustomers" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0" role="document">
    <div class="modal-content bg-transparent border-0">
  <div class="container  bg-white border-0 " style="border-radius:15px;">
 


<center>

<form action="" method="post">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Customer Name" name="customername">
  <br>
  <input type="text" required name="customerphone" class="form-control rounded-pill" placeholder="Customer Phone">
  <br>
   <input type="text" required name="customertype" class="form-control rounded-pill" placeholder="Customer Type e.g SuperMarket">
  <br>
    <input type="text" required name="customerlocation" class="form-control rounded-pill" placeholder="Customer Location">
 
 <br>
  <textarea class="form-control" style="height:160px;" name="briefinfo" placeholder="Other Information"></textarea>
  <br>
  <button name="add_customer" class="btn bg-gradient-danger" style="width:68%;"> Add Customer </button>
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
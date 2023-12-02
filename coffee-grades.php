<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Manage Grades <button data-toggle="modal" data-target="#newCoffeeGrade" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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



 <div    class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Grade Name</th>
                           <th>Min Stock Alert</th>
                           <th>Current Stock</th>
                           <th>Action</th>

                        </tr>
                     </thead>
                     <tbody>
 
 

 
<?php
$gt_grades = mysqli_query($con,"SELECT * FROM coffee_grades ORDER BY id  DESC");
while($row=mysqli_fetch_array($gt_grades))
{
$coffee_grades=htmlentities($row['coffeegrade']);
$grade_id = htmlentities($row['id']);
$cal_stock = mysqli_query($con,"SELECT SUM(remaining) AS `stock_value` FROM green_beans WHERE coffeegrade='$grade_id'");
$result = mysqli_fetch_array($cal_stock);
$grade_sum = htmlentities($result['stock_value']);
if ($grade_sum>0) {
  // code...
  $stock_current = $grade_sum;
} else {
  // code...
  $stock_current='0';
}

?>
<tr>
                     
                     <td>
                       <?php echo($coffee_grades) ?>
                     </td>
                     <td>
                       <?php echo(htmlentities($row['alertlevel'])) ?> Kgs
                     </td>
                     <td>
                      <?php echo(number_format($stock_current,2));?> Kgs
                     </td>
                     <td>
                     <a class="btn rounded btn-primary" href="edit-grades.php?coffeegrade=<?php echo(htmlentities($row['id'])) ?>">
                      <small>
                         <i class="fa fa-pen"></i>
                      </small>
                       
                     </a>  

                     <a class="btn rounded btn-danger" href="?delete-coffee-grade=<?php echo(htmlentities($row['id'])) ?>"> 
                      <small>
                        <i class="fa fa-trash"></i>
                      </small>
                       
                     </a>

                   </td>

                        </tr>

                <?php } ?>
 


                        
                     </tbody>
                     <tfoot>
                        <tr>
                          <th>Grade Name</th>
                          <th>Min Stock Alert</th>
                           <th>Current Stock</th>
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
<div style="z-index: 1000000; " class="modal fade  border-0" id="newCoffeeGrade" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0" role="document">
    <div class="modal-content bg-transparent border-0">
  <div class="container  bg-white border-0 " style="border-radius:15px;">
 


<center>

<form action="" method="post">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Coffee Grade" name="coffeegrade">
  <br>
  <input type="number" required name="alertlevel" class="form-control rounded-pill" placeholder="Alert if Stock falls below (KGz)">
  <br>
  <button name="add_coffee_grade" class="btn bg-gradient-danger" style="width:68%;"> Add Grade </button>
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
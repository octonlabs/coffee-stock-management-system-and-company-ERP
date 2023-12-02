<?php include('core/dash-header.php'); ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div   class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Manage Staff <button data-toggle="modal" data-target="#newStaff" style="float:right;" class="btn bg-gradient-primary"> <i class="fa fa-plus-circle"></i> </button> </h6>
             
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  ?>



 <div    class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Staff</th>
                           <th>Name</th>
                           <th>Position</th>
                           <th>Status</th>
                           <th>Resume</th>
                           <th>#</th>

                        </tr>
                     </thead>
                     <tbody>
 
<?php
$gt_staf = mysqli_query($con,"SELECT * FROM staffinformation ORDER BY id DESC");
while ($row=mysqli_fetch_array($gt_staf)) {
  // code...

?>

<tr>
  


<td>
  <div class="shadow-sm" style="height:90px; width: 90px; border-radius:10px; overflow: hidden;">
      <img src="uploads/staffimages/<?php echo htmlentities($row['staffimage']);?>" style="width: 100%; height:100%; object-fit: cover;">
    </div>
</td>
<td><?php echo htmlentities($row['staffname']);?><br>
  <b>Staff Code : </b><?php echo htmlentities($row['staff_code']);?>
    <br>
<a class="text-success" style="text-decoration:underline;" href="assign-access.php?staff-code=<?php echo$row['id'];?>"><b><i>Assign Acess</i></b></a>
</td>
<td><?php echo htmlentities($row['staffposition']);?>
  <br>
<a class="text-success" style="text-decoration:underline;" href="?reset-staff=<?php echo$row['id'];?>"><b><i>Reset ID</i></b></a>

</td>
<td>
  <?php

$staff_status = (htmlentities($row['staff_status'])); 
if($staff_status=='active')
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
  <a href="uploads/staffcvs/<?php echo htmlentities($row['staffcv']);?>" download class="btn btn-primary rounded">
    <i class="fa fa-paperclip"></i>
  </a>
</td>
<td>
  <a href="edit-staff.php?staff-record=<?php echo htmlentities($row['id']);?>" target="_blank">Edit</a> || 


  <?php
if($staff_status=='active')
{?>
    <a class="text-warning" href="?fire-user=<?php echo$row['id'];?>"><em>Fire User</em></a></td>
 <?php 
}
else
{
  ?>
 <a class="text-warning" href="?activate-staff=<?php echo$row['id'];?>"><em>Activate User</em></a></td>
  <?php
}

?>

</td>



</tr>

<?php } ?>
                        
                     </tbody>
                     <tfoot>
                        <tr>
                            <th>Staff</th>
                            <th>Name</th>
                           <th>Position</th>
                           <th>Status</th>
                           <th>Resume</th>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  ?>

<!------------------newCoffeeGrade modal----------------------->
<div style="z-index: 1000000; " class="modal fade mt-0 border-0" id="newStaff" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0  mt-0" role="document">
    <div class="modal-content  mt-0 bg-transparent border-0">
  <div class="container   mt-1 bg-white border-0 " style="border-radius:15px;">
 


<center>

<form action="" method="post" enctype="multipart/form-data">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Staff Name" name="staffname">
  <br>
  <input type="text" required class="form-control rounded-pill" placeholder="Staff Position" name="staffposition">
  <br>
    <input type="text" required class="form-control rounded-pill" placeholder="Total Monthly Allowances" name="staffallowances">
  <br>
    <input type="text" required class="form-control rounded-pill" placeholder="Total Monthly Salary" name="staffsalary">
  <br>
<select class="form-control rounded-pill" name="staff_status">
  <option value="active" selected>Active</option>
  <option value="fired">Fired</option>
</select>
  <br>

  <center><small>Staff Image</small></center>
  <input type="file" required class="form-control rounded-pill" accept="image/*" name="staffimage">
  <br>
  <center><small>Staff CV</small></center>
  <input type="file" required class="form-control rounded-pill"  name="staffcv">
<br>
<textarea class="form-control" style="height:150px;" name="otherinfo" placeholder="Other Staff Info e.g Phone,Email,Address E.t.c"></textarea>

  <br>
  <button name="add_staff" class="btn bg-gradient-danger" style="width:68%;"> Add Staff </button>
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
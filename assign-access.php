<?php include('core/dash-header.php');
$org_id=preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['staff-code']));
$gt_org = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$org_id'");
$row=mysqli_fetch_array($gt_org);
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="min-height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize"><b> <i><?php echo(htmlspecialchars_decode($row['staffname'])) ?>'s </i> </b>Access Settings</h6>
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
            <div class="card-body row">
   

































<form class="row" action="" method="post">


<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" 
<?php
if ($row['managesupplies']=='1') {
  // code...
  echo "checked";
} 


?> type="checkbox" value="1"  name="managesupplies">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Supplies</small>
  </div>

</center>

</div>



<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input <?php
if ($row['managesuppliers']=='1') {
  // code...
  echo "checked";
} 


?>  class="form-check-input m-3 mt-4" type="checkbox" value="1" 

                     name="managesuppliers">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Suppliers</small>
  </div>

</center>

</div>






<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4"  <?php
if ($row['manageproducts']=='1') {
  // code...
  echo "checked";
} 


?>  type="checkbox" value="1"  name="manageproducts">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Products</small>
  </div>

</center>

</div>



<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"  <?php
if ($row['managecustomers']=='1') {
  // code...
  echo "checked";
} 


?>  name="managecustomers">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Customers</small>
  </div>

</center>

</div>



<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"   <?php
if ($row['manageparchment']=='1') {
  // code...
  echo "checked";
} 


?>   name="manageparchment">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Parchment</small>
  </div>

</center>

</div>


<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"   <?php
if ($row['processparchment']=='1') {
  // code...
  echo "checked";
} 


?>   name="processparchment">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Process Parchment</small>
  </div>

</center>

</div>




<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"  <?php
if ($row['managegreenbeans']=='1') {
  // code...
  echo "checked";
} 


?>  name="managegreenbeans">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Green Beans</small>
  </div>

</center>

</div>



<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"  <?php
if ($row['processgreenbeans']=='1') {
  // code...
  echo "checked";
} 


?>  name="processgreenbeans">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Process / Sell Beans</small>
  </div>

</center>

</div>




<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4"  <?php
if ($row['managesales']=='1') {
  // code...
  echo "checked";
} 


?>  type="checkbox" value="1"  name="managesales">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Sales</small>
  </div>

</center>

</div>


<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"  <?php
if ($row['manageexpenses']=='1') {
  // code...
  echo "checked";
} 


?>   name="manageexpenses">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Expenses</small>
  </div>

</center>

</div>


<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"  <?php
if ($row['managestaff']=='1') {
  // code...
  echo "checked";
} 


?>   name="managestaff">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Manage Staff</small>
  </div>

</center>

</div>


<div class="card m-3  border-primary shadow col-md-3" style="height:160px;border:1px solid crimson;cursor: pointer;">
  
<center>
  
  <div style="width:70%; height: 80px; border-radius:12px" class="shadow-sm ">
     <div class="form-check form-switch">
                    <input class="form-check-input m-3 mt-4" type="checkbox" value="1"   <?php
if ($row['accessreports']=='1') {
  // code...
  echo "checked";
} 


?>    name="accessreports">
               
                    </div>

  </div>
  <br>
  <div class="shadow-sm text-primary text-capitalize" style="width:60%;">
    <small>Access Reports</small>
  </div>

</center>

</div>






<input type="hidden" value="<?php echo(htmlentities($row['id']));?>" name="staffcode">

            </div>
            <center>
              <button name="update_permission" class="btn btn-primary rounded-pill" style="width:80%;">Update Permissions</button>
            </center>
            </form>
          </div>
        </div>
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
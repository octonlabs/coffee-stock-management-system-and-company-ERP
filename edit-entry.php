<?php include('core/dash-header.php');
$org_id=preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['entry-code']));
$gt_org = mysqli_query($con,"SELECT * FROM organisations WHERE id='$org_id'");
$row=mysqli_fetch_array($gt_org);
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Edit An Organisation</h6>
             <?php
             if ($error) { ?>
                <center>
  <div style="width:100%" class="btn bg-gradient-danger text-white rounded-pill"><?php echo $error;?></span>
    </center>
            <?php  } elseif($success) { ?>
               
          <center>
  <div style="width:100%" class="btn bg-gradient-success text-white rounded-pill"><?php echo $success;?></span>
    </center>

             <?php } ?>
         
            </div>
            <div class="card-body">
              


<form action="" method="post" enctype="multipart/form-data">
<br>
<input   type="file" class="form-control rounded-pill" name="logo">
<input type="hidden" value="<?php echo(htmlentities($row['logo']));?>" name="org_logo">
<input type="hidden" value="<?php echo(htmlentities($row['id']));?>" name="org_id">
<br>
<input required  type="text" placeholder="Organisation Name" class="form-control rounded-pill" value="<?php echo(htmlentities($row['org_name']));?>" name="organisationname">

<br>
<input required  type="text" placeholder="Organisation Phone" value="<?php echo(htmlentities($row['org_phone']));?>" class="form-control rounded-pill" name="organisationphone">

<br>
<input required  type="text" placeholder="Organisation Location" value="<?php echo(htmlentities($row['org_location']));?>" class="form-control rounded-pill" name="organisationlocation">

<br>
<input required  type="text" placeholder="Organisation Email" value="<?php echo(htmlentities($row['org_email']));?>" class="form-control rounded-pill" name="organisationemail">

<br>
<select  class="form-control rounded-pill" name="status">
  <?php
  if ($row['status']=='public') {
    // code...
    ?>

 <option selected value="public">Public</option>
  <option value="private">Private</option>
    <?php 
  }
  else
    {?>
  <option value="public">Public</option>
  <option selected value="private">Private</option>
<?php } ?>
</select>
<br>
<textarea required placeholder="Organisation Brief" name="organisationbrief" class="form-control" style="height:100px;"><?php echo(htmlentities($row['org_brief']));?></textarea>


<br>
<textarea required placeholder="Organisation Details" name="organisationdetails" class="form-control" style="height:200px;"><?php echo(htmlentities($row['org_activities']));?></textarea>


<br>
<center>
  <button name="updateorganisation" class="btn btn-primary rounded-pill" style="width:70%;">Update Organisation</button>
</center>
<br>

</form>

            </div>
          </div>
        </div>
        

      </div>
     

<?php include('core/dash-footer.php'); ?>
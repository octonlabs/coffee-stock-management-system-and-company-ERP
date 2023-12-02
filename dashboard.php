<?php include('core/dash-header.php'); ?>

    <div class="container-fluid ">
      

   <?php
if (($_SESSION['authority']=='superadmin')) {
  // super admin stats
  include 'core/dash-admin.php';
} else {
  
if (($_SESSION['managesupplies']=='1') || ($_SESSION['managesuppliers']=='1')) {
  // show supplies statistics
  include 'core/supplies-stats.php';
} 
elseif (($_SESSION['manageproducts']=='1') || ($_SESSION['managecustomers']=='1'))
 {
  // show products statistics
  include 'core/product-stats.php';
}
elseif (($_SESSION['manageparchment']=='1') || ($_SESSION['processparchment']=='1'))
{

include 'core/parchment-stats.php';
  //show parchment statistics
}
 elseif (($_SESSION['managegreenbeans']=='1') || ($_SESSION['processgreenbeans']=='1'))
 {
//show green beans stats
  include 'core/green-bean-stats.php';
 }
elseif (($_SESSION['manageexpenses']=='1') || ($_SESSION['managesales']=='1'))

{
//show sales stats
  include ('core/revenue-stats.php');
  
}




}

   


   ?>
</div>

<?php include('core/dash-footer.php'); ?>
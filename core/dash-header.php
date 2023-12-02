<?php
include 'core/classes.php';

if ($_SESSION['admin']!=='1') {
  // code...
  echo "<script>window.location='logout.php'</script>";

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="dash/assets/img/apple-icon.png">
<link rel="stylesheet" type="text/css" href="vendor/datatables/dataTables.bootstrap4.min.css">
  <link rel="icon" type="image/png" href="dash/assets/img/favicon.png">
  <title>
    Admin - Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="dash/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="dash/assets/css/nucleo-svg.css" rel="stylesheet" />
      <link href="assets/css/font-awesome.min.css" rel="stylesheet">
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="dash/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="dash/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
 
  <aside  class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
   
    <div style="height:700px;" class="collapse navbar-collapse mt-2  w-auto " id="sidenav-collapse-main">
      <ul  class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesupplies']=='1') || ($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate
  ?>
 <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#suppliersList">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-truck-moving text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Suppliers</span>
          </a>
        </li>

  <?php
} else {
  // access denied
}
?>

       


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1') || ($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>

     <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#CustomersList">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-truck-loading text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Customers</span>
          </a>
        </li>

      <?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1') || ($_SESSION['processparchment']=='1'))) {
  // authorized to operate
  ?>

      <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#coffeeStocks">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fab fa-servicestack text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Parchment</span>
          </a>
        </li>
<?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate
  ?>

                 <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#procesSing">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-cogs text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Processing</span>
          </a>
        </li>

        <?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate
  ?>
                 <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#LiquoRing">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-coffee text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Liquoring</span>
          </a>
        </li>

      <?php } ?>




        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageexpenses']=='1') || ($_SESSION['managesales']=='1'))) {
  // authorized to operate
  ?>

              <li class="nav-item">
          <a class="nav-link " href="javascript:;"  data-toggle="modal" data-target="#transactionsList">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-swatchbook text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Ledgers</span>
          </a>
        </li>

  <?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managestaff']=='1'))) {
  // authorized to operate
  ?>

            <li class="nav-item">
          <a class="nav-link " href="staff-records.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-users text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Staff</span>
          </a>
        </li>
<?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
  ?>
             <li class="nav-item">
          <a class="nav-link " href="general-reports.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-file-pdf text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Reports</span>
          </a>
        </li>

       <li class="nav-item">
          <a class="nav-link " href="charts.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-chart-area text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Charts</span>
          </a>
        </li>
<?php } ?>
        <li class="nav-item">
          <a class="nav-link " href="logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-sign-out-alt text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
  
      </ul>
    </div>
     
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
   
 <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
     
        <div class="collapse navbar-collapse mt-sm-0 m-2 me-md-0 me-sm-4" id="navbar">
       
          <ul class="navbar-nav  justify-content-end">
        
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-danger"></i>
                  <i class="sidenav-toggler-line bg-danger"></i>
                  <i class="sidenav-toggler-line bg-danger"></i>
                </div>
              </a>
            </li>
          

          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->












        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesupplies']=='1') || ($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate
  ?>

<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="suppliersList" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->




        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesupplies']=='1'))) {
  // authorized to operate
  ?>
<a href="supplies.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">


<center>
  <h5 class="mt-1">Supplies</h5>
  <small>Manage Company Inputs</small>
</center>
 </a>
<?php } ?>

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesuppliers']=='1'))) {
  // authorized to operate
  ?>
<a href="suppliers.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">Suppliers</h5>
  <small>Suppliers of Company Inputs</small>
</center>
 </a>


<?php } ?>


<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->
<?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1') || ($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>
<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="CustomersList" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->




        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managecustomers']=='1'))) {
  // authorized to operate
  ?>
<a href="customers.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">Customers</h5>
  <small>Buyers of Company PDT/Services</small>
</center>
 </a>
<?php } ?>

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageproducts']=='1'))) {
  // authorized to operate
  ?>
<a href="products.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">


<center>
  <h5 class="mt-1">Products</h5>
  <small>List Of Company PDTs/Services</small>
</center>
 </a>

<?php } ?>


<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->

<?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managegreenbeans']=='1'))) {
  // authorized to operate
  ?>


<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="procesSing" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->




<a href="coffee-grades.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">


<center>
  <h5 class="mt-1">Coffee Grades</h5>
  <small>Manage Grades For Green Beans</small>
</center>
 </a>




<a href="green-beans.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">New Green Beans</h5>
  <small>From Processing</small>
</center>
 </a>






<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->


<?php } ?>

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['processgreenbeans']=='1') )) {
  // authorized to operate
  ?>
<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="LiquoRing" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->



 <a href="value-addition.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">New Green Beans</h5>
  <small>Store To Roasting / Sale</small>
</center>
 </a>

 
 <a href="javascript:;" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1"></h5>
  <small></small>
</center>
 </a>

 

 


<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->
<?php } ?>

        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1') || ($_SESSION['processparchment']=='1'))) {
  // authorized to operate
  ?>

<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="coffeeStocks" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->



        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageparchment']=='1'))) {
  // authorized to operate
  ?>

<a href="stock-records.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">New Parchment</h5>
  <small>Purchases From Coffee Suppliers</small>
</center>
 </a>


<?php } ?>


        <?php
if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['processparchment']=='1'))) {
  // authorized to operate
  ?>
 <a href="parchment-to-processing.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">Processing</h5>
  <small> Parchment To Processing</small>
</center>
 </a>
<?php } ?>

 



<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->

<?php } ?>



        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageexpenses']=='1') || ($_SESSION['managesales']=='1'))) {
  // authorized to operate
  ?>

<!------------------addRecordModal modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="transactionsList" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0 modal-lg" role="document">
    <div class="modal-content bg-transparent border-0">
      


     


<div class="container bg-transparent border-0 ">
 
 <div class="card bg-transparent" style=" cursor:pointer; padding: 0px;">
   


<div class="row g-2">
   <!-----menu begins---->




        <?php
if (($_SESSION['authority']=='superadmin') || ( ($_SESSION['managesales']=='1'))) {
  // authorized to operate
  ?>

  


<a href="sales.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">New Sale</h5>
  <small> Green Beans, Product Or Service (e.g Roasting)</small>
</center>
 </a>

<?php } ?>



        <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['manageexpenses']=='1'))) {
  // authorized to operate
  ?>


<a href="expenses.php" class="card shadow-sm bg-white m-2 p-2 rounded border-danger col-lg-5">

<center>
  <h5 class="mt-1">New Expense</h5>
  <small> Payments & Purchases e.g Utility Bills</small>
</center>
 </a>
<?php } ?>





<!----//-menu Ends---->

</div>







 </div>




</div>


   

    </div>
  </div>
</div>
<!---------------------End addRecordModal Modal----------------------------->

<?php } ?>
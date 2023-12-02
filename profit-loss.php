<?php include('core/dash-header.php');
//<div style="width: 170px; white-space: normal;">
  $gt_opening=mysqli_query($con,"SELECT * FROM opening_balances");
  $bal = mysqli_fetch_array($gt_opening);
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="min-height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Profit / Loss 
        <div style="float: right;" class="dropright tentra" >
  <button class="btn bg-gradient-info  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Year
  </button>
  <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuButton">

    <a class="dropdown-item" href="?time=<?php echo($period);?>&status=by-consumption&chart=<?php echo($chart); ?>">By Consumption</a>
    
  </div>
</div>
 
<button data-toggle="modal" data-target="#newOpeningYear" style="float:right;" class="btn bg-gradient-primary "> <i class="fa fa-pen"></i> Opening Balances </button>
 

              </h6>
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
  ?>
 








<center>
  <h4><?php echo($company_namez);?></h1>
  <h5>Profit - Loss Statement</h2>
  <h6>For The Period 2023</h3>
</center>
<br>
<table class="table">
  <thead>
    <tr></tr>
    <tr>
      <th>
       <b> Revenue</b>
      </th>
      <th>
        <?php echo($currency);?>
      </th>
    </tr>
  </thead>
  <tbody>
  
 
    <tr>
      <td>Opening Balance</td>
      <td>100,000</td>
    </tr>
    <?php


    $periodsales="1";
$sum_sales = mysqli_query($con,"SELECT SUM(amount) as allrevenue FROM sales WHERE ((status='paid') || (status='partial')) && created_at >= (DATE_SUB(CURDATE(), INTERVAL $periodsales YEAR))");
$sales_sum = mysqli_fetch_array($sum_sales);
$salessum = number_format($sales_sum['allrevenue'],2);

$ttl_revenue=$salessum;
    ?>
    <tr>
      <td>Sales</td>
      <td>
        <?php echo($salessum);?>
      </td>
    </tr>
    <tr>
      <td><b>Sub Total</b></td>
      <td><b><?php echo($ttl_revenue);?></b></td>
    </tr>






    <tr>
      <th>
        <b>Expenses</b>
      </th>
      <th></th>
    </tr>

    <?php
    $period='1';
    $sumexpenses = mysqli_query($con,"SELECT SUM(amount) as all_expenses FROM expenses WHERE ((status='paid') || (status='partial')) && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period YEAR))");

    $expensessum = mysqli_fetch_array($sumexpenses);
    $expense_ssum = number_format(($expensessum['all_expenses']),2);



    $gt_expenses_type = mysqli_query($con,"SELECT * FROM expenses WHERE ((status='paid') || (status='partial')) && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period YEAR)) GROUP BY(productname)");

while ($expenses_type = mysqli_fetch_array($gt_expenses_type)) {
$supply_id = htmlentities($expenses_type['productname']);
$gt_supply = mysqli_query($con,"SELECT * FROM supplies WHERE id='$supply_id'");
$supply_code = mysqli_fetch_array($gt_supply);

$sum_supply = mysqli_query($con,"SELECT SUM(amount) as supply_sum FROM expenses WHERE productname='$supply_id' &&  ((status='paid') || (status='partial')) && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period YEAR))");
$supply_sum = mysqli_fetch_array($sum_supply);
$total_sum_supply = number_format(($supply_sum['supply_sum']),2);

  ?>
    <tr>
      <td>
        <?php echo(htmlentities($supply_code['itemsupply']));?>
      </td>
      <td>
        <?php echo($total_sum_supply);?>
      </td>
    </tr>
<?php } ?>
   


    <tr>
      <td>
        <b>Total Expenses</b>
      </td>
      <td>
        <b> <?php echo($expense_ssum);?></b>
      </td>
    </tr>
      <tr>
      <td>
        <b>Net Revenue</b>
      </td>
      <td>
        <b> <?php $netprofit =  (number_format((($ttl_revenue)-($expense_ssum)),2));
        echo($netprofit); ?> </b>
      </td>
    </tr>

      <tr>
      <td>
        <b>Net Margin</b>
      </td>
      <td>
        <b> <?php 
        $net_margin = (number_format(((($netprofit)/($ttl_revenue))*100),2)).'%';
        echo($net_margin);
      ?></b>
      </td>
    </tr>
    <tr></tr>

  </tbody>
</table>

<br><br><br>







<?php } else {?>



<center>

<div class="card m-3 border-warning shadow col-md-6" style="min-height:400px;border:1px solid crimson;cursor: pointer;" onclick="window.open('supplies-report.php?time=6&status=expenditure&chart=doughnut')">
  
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
  ?>
<!------------------newCoffeeGrade modal----------------------->
<div style="z-index: 1000000; " class="modal fade  border-0" id="newOpeningYear" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog border-0" role="document">
    <div class="modal-content bg-transparent border-0">
  <div class="container  bg-white border-0 " style="border-radius:15px;">
 

 
        <?php
if (($_SESSION['authority']=='superadmin')) {
  // authorized to operate

  ?>
<center>

<form action="" method="post">
  <br>
  <input type="date" required class="form-control rounded-pill" value="<?php echo(htmlentities($bal['coffeegrade'])); ?>" placeholder="Opening Year" name="coffeegrade">
  <br>
  <input type="number"  value="<?php echo(htmlentities($bal['alertlevel'])); ?>" required name="alertlevel" class="form-control rounded-pill" placeholder="Opening Balance">
  <br>
  <button name="update_year" class="btn bg-gradient-danger" style="width:68%;"> Update Opening Balance </button>
</form>


</center>


<!-----------list opening balances-------------------->

<?php } else {?>



<center>

<div class="card m-3 border-warning shadow col-md-12" style="min-height:400px;border:1px solid crimson;cursor: pointer;" onclick="window.open('supplies-report.php?time=6&status=expenditure&chart=doughnut')">
  
<center>
  
  <div style="width:250px; height: 250px; border-radius:100%" class="shadow-sm bg-gradient-danger mt-1">
    <b style="font-size:140px; color: white;">
      !
    </b>
  </div>
  <br>
  <div class="shadow-sm text-white bg-gradient-danger text-capitalize" style="width:60%; border-radius: 12px;">
    <small>Request Admin To Edit Opening Balances</small>
  </div>

</center>

</div>
</center>

<?php } ?>

 </div>

</div>
</div>
</div>





<!-------//-------------newCoffeeGrade Modal-------------------------->

<?php } ?>
<?php include('core/dash-footer.php'); ?>
<?php include('core/dash-header.php');
$period = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['time']));
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="min-height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">System Summary from last <i class="text-warning">Last <?php echo($period);?> Months</i>

                <div style="float:right;" class="dropright tentra" >
  <button class="btn  bg-gradient-info text-uppercase btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Time
  </button>
  <div class="dropdown-menu shadow-sm" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="?time=10000">All Time</a>
    <a class="dropdown-item" href="?time=60">Last 5 Years</a>
    <a class="dropdown-item" href="?time=24">Last 2 Years</a>
    <a class="dropdown-item" href="?time=12">Last 12 Months</a>
    <a class="dropdown-item" href="?time=6">Last 6 Months</a>
    <a class="dropdown-item" href="?time=3">Last 3 Months</a>
    <a class="dropdown-item" href="?time=1">Last 30 Days</a>
  </div>
</div>
             </h6>
            </div>
            <div class="card-body p-3">






     <?php
if (($_SESSION['authority']=='superadmin') || (($_SESSION['accessreports']=='1'))) {
  // authorized to operate
  ?>
 














































<!------------Green Beans ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
    Green Bean Grades <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
    <th>
      ID
    </th>
    <th>
      Grade Code
    </th>
    <th>
      Processed
    </th>
    <th>
      Available
    </th>

  </tr>
</thead>

<tbody>
 
<?php
$gt_grades = mysqli_query($con,"SELECT * FROM coffee_grades ORDER BY id  DESC");
while($row=mysqli_fetch_array($gt_grades))
{
$coffee_grades=htmlentities($row['coffeegrade']);
$grade_id = htmlentities($row['id']);
$cal_stock = mysqli_query($con,"SELECT SUM(remaining) AS `stock_value` FROM green_beans WHERE coffeegrade='$grade_id' && processing_status='complete'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$result = mysqli_fetch_array($cal_stock);
$grade_sum = htmlentities($result['stock_value']);
$purchased = mysqli_query($con,"SELECT SUM(quantity) AS `puchases` FROM green_beans WHERE coffeegrade='$grade_id' && processing_status='complete'   && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) " );
$p_stocks = mysqli_fetch_array($purchased);
$p_st_ock = htmlentities($p_stocks['puchases']);
if ($grade_sum>0) {
  // code...
  $stock_current = $grade_sum;
} else {
  // code...
  $stock_current='0';
}

if ($p_st_ock>0) {
  // code...
  $stock_p_st_ock = $p_st_ock;
} else {
  // code...
  $stock_p_st_ock='0';
}
?>

<tr>
    <td><?php echo(htmlentities($row['id']));?></td>
  <td>
     <?php echo($coffee_grades) ?>
  </td>
  <td>
    <b><?php echo(number_format($stock_p_st_ock,2));?> Kgs</b>
  </td>
  <td>
    <b><?php echo(number_format($stock_current,2));?> Kgs</b>
  </td>

</tr>

                <?php } ?>
 

</tbody>


   </table>

<!--//----------Green Beans ------------------------>








<br>




<!------------Parchment ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
   Parchment Stock <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
  
    
    <th>
      Average Unit Price
    </th>
    <th>
      Purchased
    </th>
    <th>
      Available
    </th>
    <th>Processed</th>

  </tr>
</thead>

<tbody>
  
<?php
$gt_parch = mysqli_query($con,"SELECT * FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$ct_parch = mysqli_num_rows($gt_parch);
$sum_price_parch = mysqli_query($con,"SELECT SUM(unitprice) as parch_price FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$price_sum = mysqli_fetch_array($sum_price_parch);
$sum_parch_price = htmlentities($price_sum['parch_price']);

$total_bought_parch = mysqli_query($con,"SELECT SUM(quantity) as parch_qty FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$bought_parch_qty = mysqli_fetch_array($total_bought_parch);
$sum_purchased_parch = htmlentities($bought_parch_qty['parch_qty']);


$total_av_parch = mysqli_query($con,"SELECT SUM(remaining) as parch_av FROM parchment WHERE purchase_status='active' && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
$av_parch_qty = mysqli_fetch_array($total_av_parch);
$sum_av_parch = htmlentities($av_parch_qty['parch_av']);

$av_parch_price = number_format(($sum_parch_price)/$ct_parch,2);
$purchased_parch = number_format($sum_purchased_parch,2);
$av_parch_qty = number_format($sum_av_parch,2);

$processed_parch = number_format((($sum_purchased_parch)-($sum_av_parch)),2);
 ?>







<td><?php echo(htmlentities($av_parch_price)). ' ' . $currency ?></td>
<td><?php echo(htmlentities($purchased_parch)). ' Kgs' ?></td>
<td><?php echo(htmlentities($av_parch_qty)). ' Kgs' ?></td>
<td><?php echo(htmlentities($processed_parch)). ' Kgs' ?></td>




</tbody>






   </table>

<!--//----------Parchment ------------------------>





<br>






<!------------Supplies ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
  Supplies Consumption <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
    <th>
      ID
    </th>
    <th>
      Item
    </th>
    <th>
      Purchases
    </th>
    <th>
      Quantity
    </th>
    <th>
      Average Unit Cost
    </th>
    <th>
       Total Expenditure
    </th>

  </tr>
</thead>

<tbody>
  

<?php
$gt_susp = mysqli_query($con,"SELECT * FROM supplies ORDER BY id  DESC");
while($raw=mysqli_fetch_array($gt_susp))
{
  $unitmeasurement=htmlentities($raw['unitmeasurement']);
  $supply_id = htmlentities($raw['id']);
   $tt_purchases=mysqli_query($con,"SELECT * FROM expenses WHERE productname='$supply_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $ct_purch = mysqli_num_rows($tt_purchases);
  $sum_purch  =mysqli_query($con,"SELECT SUM(amount) as purchases_sum FROM expenses WHERE productname='$supply_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $sum_qty = mysqli_query($con,"SELECT SUM(quantity) as purchases_quantity FROM expenses WHERE productname='$supply_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $qty_sum = mysqli_fetch_array($sum_qty);
  $purchases_quantity = $qty_sum['purchases_quantity'];
  $purch_sum = mysqli_fetch_array($sum_purch);
  $tt_sum_purch=($purch_sum['purchases_sum']);
  if($ct_purch=='0')
  {
    $de_ct_purch = '1';
  }
  else
  {
    $de_ct_purch = $ct_purch;
  }
  $av_unit_cost = number_format((($tt_sum_purch)/($de_ct_purch)),2). ' '.$currency;
?>
<tr>


<td>
<?php echo(htmlentities($raw['id'])); ?>
</td>
<td>
                       <?php echo(htmlentities($raw['itemsupply'])).' ('.$unitmeasurement.')'; ?>
                     <br>
                    <?php

$supplier_status = (htmlentities($raw['status'])); 
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
  
<?php echo(number_format($ct_purch,2)); ?>
</td>


<td>
  
<?php echo(number_format($purchases_quantity,2)). ' '.$unitmeasurement; ?>
</td>

<td>
  <?php echo$av_unit_cost;?>
</td>

<td>
  
<?php echo(number_format($tt_sum_purch,2)). ' '.$currency; ?>
</td>
</tr>
<?php } ?>


</tbody>


   </table>

<!--//----------Supplies ------------------------>










<br>










<!------------Supplies ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
  Product Sales <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
    <th>
      ID
    </th>
    <th>
      Item
    </th>
    <th>
      Sales
    </th>
    <th>
      Quantity
    </th>
    <th>
      Average Unit Price
    </th>
    <th>
       Total Revenue
    </th>

  </tr>
</thead>

<tbody>
  

<?php
$gt_prods = mysqli_query($con,"SELECT * FROM products ORDER BY id  DESC");
while($praw=mysqli_fetch_array($gt_prods))
{
  $unitmeasurement=htmlentities($praw['unitmeasurement']);
  $product_id = htmlentities($praw['id']);
   $tt_sales=mysqli_query($con,"SELECT * FROM sales WHERE productname='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $ct_sales = mysqli_num_rows($tt_sales);
  $sum_sales  =mysqli_query($con,"SELECT SUM(amount) as purchases_sum FROM sales WHERE productname='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $sum_pqty = mysqli_query($con,"SELECT SUM(quantity) as sales_quantity FROM sales WHERE productname='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $qty_sum = mysqli_fetch_array($sum_pqty);
  $sales_quantity = $qty_sum['sales_quantity'];
  $sale_sum = mysqli_fetch_array($sum_sales);
  $tt_sum_sales=($sale_sum['purchases_sum']);
  if($ct_sales=='0')
  {
    $de_ct_sales = '1';
  }
  else
  {
    $de_ct_sales = $ct_sales;
  }
  $av_unit_cost = number_format((($tt_sum_sales)/($de_ct_sales)),2). ' '.$currency;
?>
<tr>


<td>
<?php echo(htmlentities($praw['id'])); ?>
</td>
<td>
                       <?php echo(htmlentities($praw['itemsupply'])).' ('.$unitmeasurement.')'; ?>
                     <br>
                    <?php

$product_status = (htmlentities($praw['status'])); 
if($product_status=='active')
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
  
<?php echo(number_format($ct_sales,2)); ?>
</td>


<td>
  
<?php echo(number_format($sales_quantity,2)). ' '.$unitmeasurement; ?>
</td>

<td>
  <?php echo$av_unit_cost;?>
</td>

<td>
  
<?php echo(number_format($tt_sum_sales,2)). ' '.$currency; ?>
</td>
</tr>
<?php } ?>


</tbody>


   </table>

<!--//----------Supplies ------------------------>










<br>







<!------------Sales ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
  Sales By Status <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
     
    <th>
      Status
    </th>
    <th>
      Sales
    </th>
    <th>
      Quantity
    </th>
    <th>
      Average Unit Price
    </th>
    <th>
       Total Sales
    </th>

  </tr>
</thead>

<tbody>
  

  <?php
$gt_sales_type = mysqli_query($con,"SELECT * FROM sales WHERE created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) GROUP BY(status) ORDER BY status ASC");
while ($sale_type = mysqli_fetch_array($gt_sales_type)) {
  // code...
  $product_id = htmlentities($sale_type['status']);
 $tt_sales=mysqli_query($con,"SELECT * FROM sales WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $ct_sales = mysqli_num_rows($tt_sales);

  $sum_pqty = mysqli_query($con,"SELECT SUM(quantity) as sales_quantity FROM sales WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $qty_sum = mysqli_fetch_array($sum_pqty);
  $sales_quantity = $qty_sum['sales_quantity'];



  $sum_sales  =mysqli_query($con,"SELECT SUM(amount) as purchases_sum FROM sales WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
 $sale_sum = mysqli_fetch_array($sum_sales);
  $tt_sum_sales=($sale_sum['purchases_sum']);
    if($ct_sales=='0')
  {
    $de_ct_sales = '1';
  }
  else
  {
    $de_ct_sales = $ct_sales;
  }
  $av_unit_cost = number_format((($tt_sum_sales)/($de_ct_sales)),2). ' '.$currency;
  ?>


<tr>
  <td class="text-capitalize text-bold text-center text-warning"><?php echo(htmlentities($sale_type['status']));?></td>

  <td>
    <?php echo(number_format($ct_sales,2)); ?>
  </td>
  <td>
    <?php echo(number_format($sales_quantity,2)). ' '.$unitmeasurement; ?>
  </td>
  <td>
      <?php echo$av_unit_cost;?>
  </td>
  <td>
    <?php echo(number_format($tt_sum_sales,2)). ' '.$currency; ?>
  </td>
</tr>



<?php } ?>
</tbody>


   </table>

<!--//----------Sales ------------------------>




<br>







<!------------Supplies ------------------------>
   <table class="table table-striped" style="border:1px solid indigo;">
<thead>
  <tr style="border:1px solid gray; font-weight: bold; background-color: indigo;">

  <center style="background-color: indigo; width: 100%;" class="text-uppercase text-bold bg-indigo text-white">
  Expenses By Status <small>(Last <?php echo($period);?> Months)</small>
  </center>
 
  </tr>
  <tr>
   
    <th>
      Status
    </th>
    <th>
      Purchases
    </th>
    <th>
      Quatity
    </th>
    <th>
      Average Unit Cost
    </th>
    <th>
       Total Cost
    </th>

  </tr>
</thead>

<tbody>

  <?php
$gt_expenses_type = mysqli_query($con,"SELECT * FROM expenses WHERE created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) GROUP BY(status) ORDER BY status ASC");
while ($expenses_type = mysqli_fetch_array($gt_expenses_type)) {
  // code...
  $product_id = htmlentities($expenses_type['status']);
 $tt_expenses=mysqli_query($con,"SELECT * FROM expenses WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $ct_expenses = mysqli_num_rows($tt_expenses);

  $sum_pqty = mysqli_query($con,"SELECT SUM(quantity) as expenses_quantity FROM expenses WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
  $qty_sum = mysqli_fetch_array($sum_pqty);
  $expenses_quantity = $qty_sum['expenses_quantity'];



  $sum_expenses  =mysqli_query($con,"SELECT SUM(amount) as purchases_sum FROM expenses WHERE status='$product_id'  && created_at >= (DATE_SUB(CURDATE(), INTERVAL $period MONTH)) ");
 $sale_sum = mysqli_fetch_array($sum_expenses);
  $tt_sum_expenses=($sale_sum['purchases_sum']);
    if($ct_expenses=='0')
  {
    $de_ct_expenses = '1';
  }
  else
  {
    $de_ct_expenses = $ct_expenses;
  }
  $av_unit_cost = number_format((($tt_sum_expenses)/($de_ct_expenses)),2). ' '.$currency;
  ?>


<tr>
  <td class="text-capitalize text-bold text-center text-warning"><?php echo(htmlentities($expenses_type['status']));?></td>

  <td>
    <?php echo(number_format($ct_expenses,2)); ?>
  </td>
  <td>
    <?php echo(number_format($expenses_quantity,2)). ' '.$unitmeasurement; ?>
  </td>
  <td>
      <?php echo$av_unit_cost;?>
  </td>
  <td>
    <?php echo(number_format($tt_sum_expenses,2)). ' '.$currency; ?>
  </td>
</tr>



<?php } ?>
</tbody>


   </table>

<!--//----------Supplies ------------------------>




















































































































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
     

<?php include('core/dash-footer.php'); ?>
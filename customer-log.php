<?php include('core/dash-header.php');
if (isset($_GET['supplier-code'])) {
  // code...



$custi_id = preg_replace('/[^A-Za-z0-9.\-]/', '', ($_GET['supplier-code']));

 

}
 ?>

    <div class="container-fluid py-4">







      <div class="row">
        <div style="min-height:550px;"  class="col-lg-12  mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize"> Customer Transaction Log</h6>
                  
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
if (($_SESSION['authority']=='superadmin') || (($_SESSION['managesales']=='1'))) {
  // authorized to operate

?>



 <div    class="table-responsive">
                  <table id="myTable" class="table table-striped" data-toggle="data-table">
                     <thead>
                        <tr>
                           <th>Product</th>
                           <th>Quantity</th>
                           <th>#</th>
                           
                           
                           <th>Customer</th>
                           <th>Handler</th>
                           <th>Other Info</th>
                           <th>#</th>

                        </tr>
                     </thead>
                     <tbody>
 
 
<?php
$gt_sale =mysqli_query($con,"SELECT * FROM sales WHERE customer='$supplier' ORDER BY id DESC");
while ($row = mysqli_fetch_array($gt_sale)) {
  // code...
$pdt = htmlentities($row['productname']);
$gt_pdts = mysqli_query($con,"SELECT * FROM products WHERE id='$pdt'");
$product = mysqli_fetch_array($gt_pdts);
$sale_status=htmlentities($row['status']);

$custs = htmlentities($row['customer']);
$custom = mysqli_query($con,"SELECT * FROM customers WHERE id='$custs'");
$custom_data=mysqli_fetch_array($custom);

$customname = htmlentities($custom_data['customername']);
$customphone = htmlentities($custom_data['customerlocation']);
$customstatus = htmlentities($custom_data['customer_status']);


 $handler_id = $row['handler'];
  $gt_handlr = mysqli_query($con,"SELECT * FROM staffinformation WHERE id='$handler_id'");
  $hands = mysqli_fetch_array($gt_handlr);
?>
  
 <tr>
   <td>
<?php echo(htmlentities($product['itemsupply']));?>
<br>
<b>Id : </b> <?php echo(htmlentities($row['receiptnumber']));?><br>
    
          <?php
if(($sale_status=='paid'))
{
  echo '<span class="badge badge-link bg-gradient-success">Paid</span>';
}
elseif(($sale_status=='partial'))
{

  echo '<span class="badge badge-link bg-gradient-info">Partial</span>';

}
elseif(($sale_status=='cancelled'))
{
echo '<span class="badge badge-link bg-gradient-danger">Cancelled</span>';
}
elseif(($sale_status=='unpaid'))
{
echo '<span class="badge badge-link bg-gradient-secondary">Unpaid</span>';
}

?>

 </td>
 <td><?php echo(number_format(($row['quantity']),2));?></td>
 <td>
<b>Price : </b><?php echo(number_format($row['unitprice']));?>
<br>
 <b>Total : </b><?php echo(number_format((htmlentities($row['unitprice']))*(htmlentities($row['quantity']))));?>
 <br>
 <b>Paid : </b><?php echo(number_format($row['amount']));?>
 </td>
 <td>
 <div style="width: 170px; white-space: normal;">
<b><?php echo($customname);?></b>
<br>
<?php echo($customphone);?>
<br>

      <?php
if(($customstatus=='active'))
{
  echo '<span class="badge badge-link bg-gradient-success">Active</span>';
}
else
{

  echo '<span class="badge badge-link bg-gradient-warning">Suspended</span>';

}
?>
</div>
 </td>
 <td>
<?php echo(htmlentities($hands['staffname']));?>

 </td>
 <td>
 <div style="width: 170px; white-space: normal;">
<?php echo(htmlentities($row['otherinfo']));?>
</div>
 </td>
 <td>
 
 
       <a  class="btn btn-primary" href="edit-sale.php?edit-sale=<?php echo $row['id'];?>">
      <small>
        <i class="fa fa-pen"></i>
      </small>
    </a>

         <?php
if(($sale_status!=='cancelled'))
{
  echo '

       <a  class="btn btn-danger" href="?cancel-sale='.$row['id'].'">
      <small>
        <i class="fa fa-power-off"></i>
      </small>
    </a>
    ';
}
else
{

}

?>



 
</td>
 
  
 </tr>





<?php } ?>
                        
                     </tbody>
                     <tfoot>
                        <tr>
                          <th>Product</th>
                           <th>Quantity</th>
                           <th>#</th>
                           
                          
                           <th>Customer</th>
                           <th>Handler</th>
                           <th>Other Info</th>
                           <th>#</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>




  <?php  } else {?>



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
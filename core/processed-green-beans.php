<?php
include('connection.php');
if (isset($_GET['processed-green-beans'])) {

//by expenditure
  $gt_supplies = mysqli_query($con,"SELECT * FROM coffee_grades  ORDER BY RAND()");
  

  while ($row= mysqli_fetch_array($gt_supplies)) {
    // code...
$id =htmlentities($row['id']);
$gt_expense = mysqli_query($con,"SELECT SUM(remaining) as amounts FROM green_beans WHERE coffeegrade='$id'");
$expense=mysqli_fetch_array($gt_expense);

$sum_quantity = mysqli_query($con,"SELECT SUM(quantity) as amount FROM green_beans WHERE coffeegrade='$id'");
$qty = mysqli_fetch_array($sum_quantity);
$qty_avail = htmlentities($qty['amount'])

$item_name=htmlspecialchars_decode($row['coffeegrade']);
$item_cost =htmlentities($expense['amounts']);

 $total_stock = $item_cost+$qty_avail;
 $avai = (($item_cost/$total_stock)*100);
 $ttle= (($qty_avail/$total_stock)*100);

$body =   array("label"=>$item_name, 
  "symbol" => "". $item_name."",
  "y"=>$item_cost);
  
  
$data[] = $body;
  }
echo json_encode($data);
  // code...


 


}


?>